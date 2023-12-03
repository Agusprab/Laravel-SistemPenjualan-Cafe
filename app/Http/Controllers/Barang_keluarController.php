<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Pegawai;
use App\Models\Stok_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class Barang_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta"); 
    }
    public function index()
    {
        $data = Barang_keluar::all();

        return view('admin.listSoldItem',[
          'title' => 'Data Barang Terjual',
          'listbarang' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $stokbarang = Stok_barang::all();
        
        return view('admin.addBarangKeluar',[
            'title' => 'Tambah Barang Terjual',
            'barang' => $barang,
            'stok' => $stokbarang

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['pegawai_id'] = Auth::guard('pegawai')->user()->id;
        $request['harga_total'] = $request['jumlah_barang'] * $request['harga_jual'];
     
        $validatedData = $request->validate([
         'barang_id' => 'required',
         'pegawai_id' => 'required',
         'jumlah_barang' => 'required',
         'harga_jual' => 'required',
         'harga_total' => 'required'
     ]);
     $findstok = Stok_barang::firstWhere('barang_id', $request['barang_id']);
     if($request['jumlah_barang'] > $findstok['total_barang']){
        return redirect('/admin/solditems/add')->with('alert', 'Stok Barang '. $findstok->barang->nama_barang.' tersisa '.$findstok['total_barang'].' Pcs!');
     }
     Barang_keluar::create($validatedData);
     $updateStok = $findstok['total_barang'] - $request['jumlah_barang'];
     $tableStok['total_barang'] = $updateStok;
     $findstok->update($tableStok);
     return redirect('/admin/solditems')->with('alertSuccessAdd', 'Barang Terjual Berhasil Di Tambahkan!');
    }

    public function destroy($id)
    {
        $findBarangKeluar = Barang_keluar::findOrfail($id);
        $findstok = Stok_barang::firstWhere('barang_id', $findBarangKeluar['barang_id']);
        $updateStok = $findstok['total_barang'] + $findBarangKeluar['jumlah_barang'];
        $tableStok['total_barang'] = $updateStok;
        $findstok->update($tableStok);
        Barang_Keluar::destroy($id);
        return redirect('/admin/solditems')->with('alertSuccessDelete', 'Barang Berhasil Di Hapus Permanent!');
    }

    public function cetakAll(){
        $data = Barang_keluar::all();
 
    	$pdf = PDF::loadview('admin.BarangKeluarAllData',['listbarang'=>$data,
        'custom' => 0,
        'total_harga' => 0,
        'total_barang' => 0]);
    	return $pdf->stream('laporan-Data-Barang-Terjual.pdf');
    }

    public function customCetak(Request $request){
 
        $startDate = $request['mulai'];
        $endDate = $request['batas'];
        $total_harga = 0;
        $data = Barang_keluar::all()->whereBetween('created_at', [$startDate, $endDate]);
     
        $pdf = PDF::loadview('admin.BarangKeluarAllData',[
            'listbarang'=>$data,
            'custom' => 1,
            'awal' => $startDate,
            'akhir' => $endDate,
            'total_harga' => 0,
            'total_barang' => 0
        ]);
    	return $pdf->stream('laporan-Data-Barang-Terjual.pdf');
    }
}
