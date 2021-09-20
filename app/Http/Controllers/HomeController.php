<?php

namespace App\Http\Controllers;
use App\User;
use App\Workshop;
use App\Booking;
use App\Opening;
use DB;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name' => 'User']);
         //auth()->user()->assignRole('Admin');
         if(auth()->user()->hasRole('Admin')){
            return redirect('/admin');
         }
         $workshops = Workshop::Orderby('id','desc')->get();

        return view('home', ['workshops'=> $workshops]);
    }

    public function admin(){
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function view($id){
        $user = User::find($id);
        return view('view', ['user' => $user]);
    }

    public function activate(Request $request){
        $user = User::find($request->id);
        $user->isActive = 1;
        $result = $user->update();
        if($result){
            return \redirect('/admin');
        }else{
            return \back();
        }

    }

    public function Book($id){
        $workshop = Workshop::find($id);
        $openings = $workshop->Opening;
        return \view('booking', ['workshop' => $workshop, 'openings'=>$openings]);
    }

    public function AddBooking(Request $request){
        $validated = $request->validate([
            'workshop_id' => 'required',
            'opening_id' => 'required',
            'noOfHours' => 'required|min:1',
            'startTime' => 'required',

        ]);
        $opening = Opening::find($request->input('opening_id'));
        $openingdate = $opening->openingdate;
        $userId = Auth()->user()->id;
        $workshopId = $request->input('workshopId');
        $openingid = $request->input('opening_id');
       // $book = DB::statement("Select top 1 from bookings where user_id = '$userId' and opening_id = ' $openingid'");
        // $booking = DB::statement("select * from bookings
        // inner join openings on openings.id = bookings.opening_id
        // where bookings.user_id = '$userId' and openings.openingdate = '$openingdate'")->get();
         $opening = Opening::find($request->input('opening_id'));
        $openingdate = $opening->openingdate;
        // $booking = DB::table('bookings')
        // ->join('openings', function ($join) {
        //     $join->on('openings.id', '=', 'bookings.opening_id')
        //          ->where(
        //             function ($query) use ($openingdate) {
        //                 $query->where('bookings.user_id', '=', Auth()->user()->id);
        //                 $query->whereRaw(' openings.openingdate = ?', array($openingdate));
        //             }
        //          );
        // })
        // ->get();
        $results = DB::select(DB::raw("select * from bookings
         inner join openings on openings.id = bookings.opening_id
         where bookings.user_id = '$userId' and openings.openingdate = '$openingdate'"));


        if ($results == true) {
            $request->session()->flash('error', 'You cannot Book more than one Workshop in a day!');
            return \back()->withInput();
        }else{
            $book = new Booking();
            $book->workshop_id = $workshopId;
            $book->opening_id = $request->input('opening_id');
            $book->noOfHours = $request->input('noOfHours');
            $book->startTime = $request->input('startTime');
            $book->user_id = $userId;
            $saved = $book->save();

            $request->session()->flash('message', 'Workshop booked successfully!');
            return redirect('/bookings');

        }

    }



    public function AddOpening($id){
        $workshop = Workshop::find($id);
        return \view('workshop.addOpen', ['workshop'=> $workshop]);
    }


    public function Saveopen(Request $request,$id){
        $workshop = Workshop::find($id);
        $open = new Opening();
        $validated = $request->validate([
            'openingdate' => 'required',
            'hourFrom' => 'required',
            'hourTo' => 'required',
        ]);
        $open->openingdate = $request->input('openingdate');
        $open->hourFrom = $request->input('hourFrom');
        $open->hourTo = $request->input('hourTo');
        $open->workshop_id = $request->input('workshop_id');
       $done =  $open->save();
       if($done){
        $request->session()->flash('message', 'Workshop Updated successfully!');
        // return \redirect()->route('index');
        return redirect('/workshop');
         }else{
        // return \back();
        return back()->withInput();
    }
        return \view('workshop.addOpen', ['workshop'=> $workshop]);
    }

    public function DeleteOpening($id){
        $open = Opening::find($id);
        $open->delete();
        return \redirect('/workshop');
    }


    public function Bookings(){
        //$user  = Auth()->user();
        //$user = App\User::find(1);
        $bookings =Auth()->user()->Booking;
        // $opening = $bookings->Opening;
        return \view('bookings', ['bookings'=> $bookings]);
    }

}
