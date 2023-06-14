<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Obat::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function show(Obat $obat)
    { 
        return response()->json($obat);
    }

    public function index()
    {   
        $title = "Data Obat";
        $obats = Obat::orderBy('id','asc')->paginate();
        return view('positions.index', compact(['positions' , 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Obat";
        return view('positions.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_resep' => 'required'
        ]);

        var_dump($request);
        die;
        
        Obat::create($request->post());

        return redirect()->route('positions.index')->with('success','Position has been created successfully.');
    }

    public function edit(Obat $obat)
    {
        $title = "Edit Data Obat";
        return view('positions.edit',compact('position' , 'title'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',
            'alias' => 'required',
        ]);
        
        $obat->fill($request->post())->save();

        return redirect()->route('positions.index')->with('success','Position Has Been updated successfully');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('positions.index')->with('success','Position has been deleted successfully');
    }
    
    
}
