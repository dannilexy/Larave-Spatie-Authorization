<?php

namespace App\Http\Controllers;
use App\User;
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
        return view('home');
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
}
