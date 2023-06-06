<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasiens;
use App\Models\Dokters;
class PasienController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Pasien::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function show(Pasien $pasien)
    {
        return response()->json($pasien);
    }
}
