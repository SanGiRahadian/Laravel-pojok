<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RESEP;
use App\Models\RESEPDetail;
use Illuminate\Http\Request;
use App\Exports\ExportPositions;
use Maatwebsite\Excel\Facades\Excel;
use App\Charts\ResepLineChart;

class RESEPController extends Controller
{
    public function index()
    {
        $title = "Data Resep";
        $reseps = RESEP::orderBy('id','Asc')->get();
        return view('reseps.index', compact(['reseps', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Resep";
        $managers = User::where('position', '1')->orderBy('id','asc')->get();
        return view('reseps.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_resep' => 'required',
            
        ]);

        $resep = [
            'no_resep' => $request->no_resep,
            'nama_pasien' => $request->nama_pasien,
            'tgl_resep'=> $request->tgl_resep,
            'tgl_lahir'=> $request->tgl_lahir,
            'name_dokter' => $request->name_dokter,
            'no_sip'=> $request->no_sip,
            'alamat'=> $request->alamat,
            'umur_pasien'=> $request->umur_pasien,
            'riwayat_alergi'=> $request->riwayat_alergi,
            'penyusun' => $request->penyusun,
            'total' => $request->total,
        ];
        if($result = RESEP::create($resep)){
            for ($i=1; $i <= $request->jml; $i++) { 
                $details = [
                    'no_resep' => $request->no_resep,
                    'id_product' => $request['id_product'.$i],
                    'nama_obat' => $request['nama_obat'.$i],
                    'jenis_obat' => $request['jenis_obat'.$i],
                    'bentuk_obat' => $request['bentuk_obat'.$i],
                    'aturan_minum' => $request['aturan_minum'.$i],
                    'price' => $request['price'.$i],
                    'qty' => $request['qty'.$i],
                    'sub_total' => $request['sub_total'.$i],
                ];
                RESEPDetail::create($details);
            }
            
        }
        return redirect()->route('reseps.index')->with('success', 'Resep has been created successfully.');
    }


    public function show(RESEP $reseps)
    {
        return view('reseps.show', compact('resep'));
    }


    public function edit(RESEP $resep)
    {
        $title = "Edit Data resep";
        $managers = User::where('position', '1')->orderBy('id','asc')->get();
        $detail = RESEPDetail::where('no_trx', $resep->no_resep)->orderBy('id','asc')->get();
        return view('reseps.edit', compact(['resep', 'title']));
    }


    public function update(Request $request, RESEP $resep)
    {
        $reseps = [
            'no_resep' => $request->no_resep,
            'nama_pasien' => $request->nama_pasien,
            'tgl_resep'=> $request->tgl_resep,
            'tgl_lahir'=> $request->tgl_lahir,
            'name_dokter' => $request->name_dokter,
            'no_sip'=> $request->no_sip,
            'alamat'=> $request->alamat,
            'umur_pasien'=> $request->umur_pasien,
            'riwayat_alergi'=> $request->riwayat_alergi,
            'penyusun' => $request->penyusun,
            'total' => $request->total,
        ];
        if($resep->fill($reseps)->save()){
            RESEPDetail::where('no_resep', $resep->no_resep)->delete();
            for ($i=1; $i <= $request->jml; $i++) { 
                $details = [
                    'no_resep' => $request->no_trx,
                    'id_product' => $request['id_product'.$i],
                    'nama_obat' => $request['nama_obat'.$i],
                    'jenis_obat' => $request['jenis_obat'.$i],
                    'bentuk_obat' => $request['bentuk_obat'.$i],
                    'aturan_minum' => $request['aturan_minum'.$i],
                    'price' => $request['price'.$i],
                    'qty' => $request['qty'.$i],
                    'sub_total' => $request['sub_total'.$i],
                ];
                RESEPDetail::create($details);
            }
            
        }
        return redirect()->route('reseps.index')->with('success', 'Resep Has Been updated successfully');
    }


    public function destroy(RESEP $resep)
    {
        $resep->delete();
        return redirect()->route('reseps.index')->with('success', 'Resep has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportPositions, 'reseps.xlsx');
    }

    public function chartLine()
    {
        $api = url(route('reseps.chartLineAjax'));
   
        $chart = new ResepLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
          $title = "Chart Ajax";
        return view('home', compact('chart', 'title'));
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $reseps = RESEP::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
  
        $chart = new ResepLineChart;
  
        $chart->dataset('New User Register Chart', 'bar', $reseps)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);
  
        return $chart->api();
    }
}

