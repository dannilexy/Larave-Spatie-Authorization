<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;

class WorkShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $workshops = Workshop::all();
        return view('workshop.index', ['workshops' => $workshops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('workshop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:workshops',
            'description' => 'required',

        ]);
        $workshop = new Workshop();
        $workshop->name = $request->input('name');
        $workshop->description = $request->input('description');
        $saved = $workshop->save();

        if($saved){
            $request->session()->flash('message', 'Workshop Created successfully!');
            // return \redirect()->route('index');
            return redirect('/workshop');
        }else{
            // return \back();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = Workshop::find($id);
         $openings = $workshop->Opening;
        return view('workshop\show',['workshop'=>$workshop, 'openings'=> $openings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Workshop::find($id);
        return \view('workshop\edit',['work'=> $work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'dateOpen' => 'required',
            'hourFrom' => 'required',
            'hourTo' => 'required',
        ]);
        $workshop =  Workshop::find($id);
        $workshop->name = $request->input('name');
        $workshop->dateOpen = $request->input('dateOpen');
        $workshop->hourFrom = $request->input('hourFrom');
        $workshop->hourTo = $request->input('hourTo');
        $saved = $workshop->update();

        if($saved){
            $request->session()->flash('message', 'Workshop Updated successfully!');
            // return \redirect()->route('index');
            return redirect('/workshop');
        }else{
            // return \back();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $workshop = Workshop::find($id);
       $delete = $workshop->delete();
       if($delete){
        //$request->session()->flash('message', 'Workshop Deleted successfully!');
        // return \redirect()->route('index');
        return redirect('/workshop');
       }
    }
}
