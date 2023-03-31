<?php

namespace App\Http\Controllers;
use App\Models\Position;

use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $title = "Data Position";
        $positions = Position::orderBy('id','asc')->paginate(5);
        return view('positions.index', compact(['positions','title']));
    }

    // copy paste

    public function create()
    {
        $title = "Tambah Data Position";
        return view('positions.create',compact('title'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email',
            'alias',
        ]);
        
        Position::create($request->post());

        return redirect()->route('positions.index')->with('success','Positions has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Positions $Positions)
    {
        return view('positions.show',compact('Position'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Positions  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Positions $Positions)
    {
        return view('positions.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Positions $Positions)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $company->fill($request->post())->save();

        return redirect()->route('positions.index')->with('success','Positions Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Positions  $company
    * @return \Illuminate\Http\Response
    */

    public function destroy(Positions $Positions)
    {
        $company->delete();
        return redirect()->route('positions.index')->with('success','Positions has been deleted successfully');
    }
}