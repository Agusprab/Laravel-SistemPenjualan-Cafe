<?php

namespace App\Http\Controllers;

use App\Models\Stok_barang;
use App\Models\Barang;
use App\Models\Barang_masuk;
use Illuminate\Http\Request;
use PDF;

class Stok_barangController extends Controller
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
        $data = Stok_barang::all();

        return view('admin.listStokBarang',[
            'title' => 'List Barang',
            'listBarang' => $data,
      
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::firstWhere('id',$id);
        $Barang_masuk = Barang_masuk::where('barang_id', $id)->get();
        
        return view('admin.detailStokBarang',[
            'title' => 'Detail Stok Barang',
            'barang' => $barang,
            'Barang_masuk' => $Barang_masuk
        ]);
    }

    public function cetakAll(){
        $data = Stok_barang::all();
    	$pdf = PDF::loadview('admin.StokBarangAllData',['listbarang'=>$data,
        'custom' => 0,
        'total_barang' => 0]);
    	return $pdf->stream('laporan-Data-Stok-Barang-.pdf');
    }

    public function cetakDetailAll(Request $request,$id){
        $barang = Barang::firstWhere('id',$id);
        $nama = $barang['nama_barang'];

        $startDate = $request['mulai'];
        $endDate = $request['batas'];

        if($request['mulai'] !== NULL){
            $data = Barang_masuk::where('barang_id', $id)->whereBetween('created_at', [$startDate, $endDate])->get();
           $cs = 1;
        }else{
            $data = Barang_masuk::where('barang_id', $id)->get();
            $cs = 0;
        }
        
        $pdf = PDF::loadview('admin.detailBarangAllData',['listbarang'=>$data,
        'custom' => $cs,
        'total_barang' => 0,
        'barang' => $barang,
        'awal' => $startDate,
        'akhir' => $endDate
    ]);
    	return $pdf->stream('laporan-Data-Barang-'. $nama .'.pdf');
     }
}
