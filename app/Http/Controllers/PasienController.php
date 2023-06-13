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
        $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'required',
            'tanggal_masuk' => 'required',
            'penyakit' => 'nullable|string',
            'telepon' => 'required|max:15',
            'alamat' => 'required',
            ]);
            $save = Pasiens::table('pasien')->insert([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_masuk' => $request->tanggal_masuk,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'penyakit' => $request->penyakit,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
                
                if($save){
                  
        return redirect()->route('pasiens.index')->with('success', 'Pasiens has been created successfully.');
    }

    }
    public function show(Pasiens $pasien)
    {
        return response()->json($pasien);
    }


    public function edit(Pasiens $pasien)
    {
        $title = "Edit Data user";
        $dokters = Dokters::all();
        return view('pasiens.edit', compact('pasien', 'title', 'dokters'));
    }


    public function update(Request $request, Pasiens $pasien)
    {
        $request->validate([
            'nama' => 'required|string',
            'penyakit' => 'nullable|string',
            'telepon' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
            ]);
        
        $pasien = Pasiens::table('pasien')->find($request->id);
        
        Pasiens::table('pasien')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'penyakit' => $request->penyakit,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:i:s')
            ]);

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
    public function autocomplete(Request $request)
    {
        $data = Pasiens::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    } 
}
