<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasiens;
use App\Models\Dokters;
class PasienController extends Controller
{
    public function index()
    {
        $title = "Data Master Pasien";
        $pasiens = Pasiens::orderBy('id', 'asc')->paginate(5);
        return view('pasiens.index', compact(['pasiens', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Pasien";
        $dokters = Dokters::all();
        return view('pasiens.create', compact('title', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate
        (['name' => 'required',
            'alamat',
            'jenispenyakit',
            'dokter',
        
        ]);

        Pasiens::create($request->post());

        return redirect()->route('pasiens.index')->with('success', 'Pasiens has been created successfully.');
    }


    public function show(Pasiens $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }


    public function edit(Pasiens $pasien)
    {
        $title = "Edit Data user";
        $dokters = Dokters::all();
        return view('pasiens.edit', compact('pasien', 'title', 'dokters'));
    }


    public function update(Request $request, Pasiens $pasien)
    {
        $request->validate(['name' => 'required',
            'alamat',
            'jenispenyakit',
            'dokter',
        ]);

        $pasien->fill($request->post())->save();

        return redirect()->route('pasiens.index')->with('success', 'pasiens Has Been updated successfully');
    }


    public function destroy(Pasiens $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasiens.index')->with('success', 'Position has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportPasiens, 'pasiens.xlsx');
    }   
}
