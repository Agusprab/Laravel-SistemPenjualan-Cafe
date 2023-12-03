<?php

namespace App\Http\Controllers;

use App\Models\Barang_masuk;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Stok_barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class Barang_masukController extends Controller
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
        $data = Barang_masuk::all();

      return view('admin.listIncomeItems',[
        'title' => 'Data Barang Masuk',  
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
        $supplier = Supplier::all();
        return view('admin.addBarangMasuk',[
            'title' => 'Tambah Barang Masuk',
            'barang' => $barang,
            'supplier' => $supplier

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
       $validatedData = $request->validate([
        'barang_id' => 'required',
        'pegawai_id' => 'required', 
        'supplier_id' => 'required',
        'jumlah_barang' => 'required',
        'harga_beli' => 'required'

    ]);
    Barang_Masuk::create($validatedData);


    // add stok barang
    $findstok = Stok_barang::firstWhere('barang_id', $request['barang_id']);
    $tableStok = [
        'barang_id' => $request['barang_id'],
        'total_barang' => $request['jumlah_barang']
    ]; 
    if(!$findstok){
        Stok_barang::create($tableStok);
    }
    else{
       $updateStok = $findstok['total_barang'] + $request['jumlah_barang'];
       $tableStok['total_barang'] = $updateStok;
      $findstok->update($tableStok);
    }

    return redirect('/admin/incomeitems')->with('alertSuccessAdd', 'Barang Masuk Berhasil Di Tambahkan!');
    }

    public function destroy($id)
    {
        $findBarangKeluar = Barang_masuk::findOrfail($id);
        $findstok = Stok_barang::firstWhere('barang_id', $findBarangKeluar['barang_id']);
        $updateStok = $findstok['total_barang'] - $findBarangKeluar['jumlah_barang'];
        $tableStok['total_barang'] = $updateStok;
        $findstok->update($tableStok);
       Barang_masuk::destroy($id);
       return redirect('/admin/incomeitems')->with('alertSuccessDelete', 'Barang Berhasil Di Hapus Permanent!');
    }


    public function cetakAll(){
        $data = Barang_masuk::all();
 
    	$pdf = PDF::loadview('admin.BarangMasukAllData',['listbarang'=>$data,
        'custom' => 0,
        'total_harga' => 0,
        'total_barang' => 0]);
    	return $pdf->stream('laporan-Data-Barang-Masuk.pdf');
    }

    public function customCetak(Request $request){
 
        $startDate = $request['mulai'];
        $endDate = $request['batas'];

        $total_harga = 0;
        $data = Barang_masuk::all()->whereBetween('created_at', [$startDate, $endDate]);
     
        $pdf = PDF::loadview('admin.BarangMasukAllData',[
            'listbarang'=>$data,
            'custom' => 1,
            'awal' => $startDate,
            'akhir' => $endDate,
            'total_harga' => 0,
            'total_barang' => 0
        ]);
    	return $pdf->stream('laporan-Data-Masuk.pdf');
    }
}
