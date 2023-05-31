<?php

namespace App\Http\Controllers;

use App\Models\Dokters;
use Illuminate\Http\Request;
use App\Exports\ExportPositions;
use Maatwebsite\Excel\Facades\Excel;

class DokterController extends Controller
{
    public function index()
    {
        $title = "Data Dokter";
        $dokters = Dokters::orderBy('id','Asc')->get();
        return view('dokters.index', compact(['dokters', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Dokter";
        $managers = Dokter::where('position', '1')->get();
        $managers = Pasien::where('position', '1')->get();
        return view('dokters.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat',
            'spesialis',
            'tgl_mulai_tugas',
            'status',
        ]);

        Dokters::create($request->post());

        return redirect()->route('dokters.index')->with('success', 'Dokter has been created successfully.');
    }


    public function show(Dokters $dokter)
    {
        return view('dokters.show', compact('dokter'));
    }


    public function edit(Dokters $dokter)
    {
        $title = "Edit Data Dokter";
        $dokters = Dokters::orderBy('id', 'asc')->paginate(5);
        return view('dokters.edit', compact(['dokter', 'title']));
    }


    public function update(Request $request, Dokters $dokter)
    {
        $request->validate([
            'name' => 'required',
            'alamat',
            'spesialis',
            'tgl_mulai_tugas',
            'status',
        ]);

        $dokter->fill($request->post())->save();

        return redirect()->route('dokters.index')->with('success', 'Dokter Has Been updated successfully');
    }


    public function destroy(Dokters $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokters.index')->with('success', 'Dokter has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportPositions, 'positions.xlsx');
    }
}
