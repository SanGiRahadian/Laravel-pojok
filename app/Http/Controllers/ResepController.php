<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reseps;
use App\Models\Pasiens;
use Illuminate\Http\Request;
use App\Exports\ExportPositions;
use Maatwebsite\Excel\Facades\Excel;

class ResepController extends Controller
{
    public function index()
    {
        $title = "Data Resep";
        $reseps = Reseps::orderBy('id','Asc')->get();
        return view('reseps.index', compact(['reseps', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Resep";
        $managers = resep::where('position', '1')->get();
        $managers = Pasien::where('position', '1')->get();
        return view('pasiens.create', compact('title'));
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

        Reseps::create($request->post());

        return redirect()->route('reseps.index')->with('success', 'Resep has been created successfully.');
    }


    public function show(Reseps $resep)
    {
        return view('reseps.show', compact('resep'));
    }


    public function edit(Reseps $resep)
    {
        $title = "Edit Data resep";
        $reseps = Reseps::orderBy('id', 'asc')->paginate(5);
        return view('reseps.edit', compact(['resep', 'title']));
    }


    public function update(Request $request, Reseps $resep)
    {
        $request->validate([
            'no_resep' => 'required',
            'nama_pasien',
            'nama_dokter',
            'tgl',
            'status',
        ]);

        $resep->fill($request->post())->save();

        return redirect()->route('reseps.index')->with('success', 'Resep Has Been updated successfully');
    }


    public function destroy(Reseps $resep)
    {
        $resep->delete();
        return redirect()->route('reseps.index')->with('success', 'Resep has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportPositions, 'positions.xlsx');
    }
}
