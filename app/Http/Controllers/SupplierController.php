<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Barang_masuk;

use PDF;
class SupplierController extends Controller

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
        $data = Supplier::all();
        return view('admin.listSupplier',[
            'title' => 'List Supplier',
            'listBarang' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSupplier()
    {
        $randomalpha = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 8);
        $randomnumeric = substr(str_shuffle("0123456789"), 0, 4);
        $random = strtoupper($randomalpha);
        $random = $random.$randomnumeric;


        return view('admin.addSupplier',[
            'title' => 'Tambah Supplier Baru',
            'kode_supplier' => $random
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSupplier(Request $request)
    {
        $validatedData = $request->validate([
            'kode_supplier' => 'required|max:255|unique:supplier',
            'nama_supplier' => 'required', 
            'alamat_supplier' => 'required'     ,
            'no_tlp' => 'required'

        ]);        
        Supplier::create($validatedData);
        return redirect('/admin/listsupplier')->with('alertSuccessAdd', 'Supplier Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSupplier($id)
    {
        $data = Supplier::findOrfail($id);
        return view('admin.editSupplier',[
            'title' => 'Ubah Supplier',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSupplier(Request $request, $id)
    {
        $data = Supplier::findOrfail($id);
        if($request['kode_supplier'] === $data['kode_supplier']){
            $validates = 'required';
        }else{
            $validates = 'required|max:255|unique:supplier';
        }

        $validatedData = $request->validate([
            'kode_supplier' =>  $validates,
            'nama_supplier' => 'required', 
            'alamat_supplier' => 'required',
            'no_tlp' => 'required'

        ]);        
        $data->update($validatedData);
        return redirect('/admin/listsupplier')->with('alertSuccessAdd', 'Supplier Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySupplier($id)
    {
        $barang_masuk = Barang_masuk::firstWhere('supplier_id',$id);
        if($barang_masuk !== NULL){
            return redirect('/admin/listsupplier')->with('alertFailDelete', 'Gagal Di hapus, hapus terlebih dahulu Supplier di Barang Masuk!');
        }

        $data = Supplier::findOrfail($id);
        $data->forceDelete();
        return redirect('/admin/listsupplier')->with('alertSuccessDelete', 'Supplier Berhasil Di Hapus Permanent!');
    }

    public function cetakAllData(){
        $data = Supplier::all();


        $pdf = PDF::loadview('admin.SupplierAllData',[
            'supplier'=>$data,
            'custom' => 1,
            'total_harga' => 0,
            'total_barang' => 0
        ]);
        return $pdf->stream('laporan-Daftar-Supplier.pdf');

    }
}
