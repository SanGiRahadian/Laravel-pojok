<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    public function index()
    {
        $title = "Data Department";
        $departements = Departements::orderBy('id', 'asc')->paginate(5);
        return view('departements.index', compact(['departements', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Department";
        return view('departements.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location',
            'manager_id' => 'required'
        ]);

        Departements::create($request->post());

        return redirect()->route('departements.index')->with('success', 'Department has been created successfully.');
    }


    public function show(Departements $department)
    {
        return view('departements.show', compact('department'));
    }


    public function edit(Departements $department)
    {
        $title = "Edit Data Department";
        return view('departements.edit', compact(['department', 'title']));
    }


    public function update(Request $request, Departements $department)
    {
        $request->validate([
            'name' => 'required',
            'location',
            'manager_id' => 'required'
        ]);

        $department->fill($request->post())->save();

        return redirect()->route('departements.index')->with('success', 'Department Has Been updated successfully');
    }


    public function destroy(Departements $department)
    {
        $department->delete();
        return redirect()->route('departements.index')->with('success', 'Department has been deleted successfully');
    }
}