<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Barang_masuk;
use Yajra\Datatables\Datatables;
class BarangController extends Controller
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
       $data = Barang::all();
        return view('admin.listItem',[
            'title' => 'List Barang',
            'listBarang' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addItem()
    {
        $randomalpha = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 6);
        $randomnumeric = substr(str_shuffle("0123456789"), 0, 4);
        $random = strtoupper($randomalpha);
        $random = $random.$randomnumeric;

      return view('admin.addItem',[
        'title' => 'List Barang',
        'kode_barang' => $random
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeItem(Request $request)
    {
        
        $validatedData = $request->validate([
            'kode_barang' => 'required|max:255|unique:barang',
            'nama_barang' => 'required',      

        ]);        
        Barang::create($validatedData);
        return redirect('/admin/listitem')->with('alertSuccessAdd', 'Barang Berhasil Di Tambahkan!');
    }

    public function editItem($id)
    {
        //
        $item = Barang::findOrfail($id);
        
        return view('admin.editItem',[
            'title' => 'Edit Item',
            'item' => $item
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, $id)
    {    
        $data = Barang::findOrfail($id);
        $validatedData = $request->validate([
            'kode_barang' => 'required|max:255',
            'nama_barang' => 'required',      

        ]);        
        $data->update($validatedData);
        return redirect('/admin/listitem')->with('alertSuccessAdd', 'Barang Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem($id)
    {   
        $barang_masuk = Barang_masuk::firstWhere('barang_id',$id);
        if($barang_masuk !== NULL){
            return redirect('/admin/listitem')->with('alertFailDelete', 'Gagal Di hapus, hapus terlebih dahulu barang di Barang Masuk!');
        }
        
        $data = Barang::findOrfail($id);
        $data->forceDelete();
        return redirect('/admin/listitem')->with('alertSuccessDelete', 'Barang Berhasil Di Hapus Permanent!');
    }
}
