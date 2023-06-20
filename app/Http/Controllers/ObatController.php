<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Obat::select("name_obat as value", "id")
                    ->where('name_obat', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function show(Obat $obat)
    { 
        return response()->json($obat);
    }

}