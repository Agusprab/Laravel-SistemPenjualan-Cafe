<?php

namespace App\Http\Controllers;

use App\Models\Barang_masuk;
use App\Models\Barang_keluar;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class adminController extends Controller
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

        $bulanSekarang = date('m');
        $jmlPegawai = Pegawai::all()->count();
        $barangTerjual = Barang_keluar::whereMonth('created_at',$bulanSekarang)->orderBy('id','desc')->get();
        $barangMasuk = Barang_masuk::whereMonth('created_at',$bulanSekarang)->orderBy('id','desc')->get();
      
        


        return view('admin.index',[
            'title' => 'Dashboard Admin',
            'jmlPegawai' => $jmlPegawai,
            'barangTerjual' => $barangTerjual,
            'jmlBarangTerjual' => 0,
            'jmlBarangMasuk' => 0,
            'total_pendapatan' => 0,
            'total_pengeluaran' => 0,
            'barangMasuk' => $barangMasuk,
            'i'=> 0,
            'a'=> 0
        ]);
    }

    public function manageUser()
    {
        $data = Pegawai::all();
        return view('admin.manageUsers',[
            'title' => 'Manage Users',
            'dataPegawai' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adduser()
    {  $data = Pegawai::all();
       return view('admin.addUser',[
        'title' => 'Add User',
        'dataPegawai' => $data
       ]);
    }

    public function storeuser(Request $request){
        $request['email'] = strtolower($request['email']);
        $username = explode("@",$request['email']);
        $request['username'] = $username[0];
        $request['password'] = bcrypt($request['password']);        


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:pegawai',
            'password' => 'required',
            'role' => 'required',
            'username' => 'required'

        ]);
      
        Pegawai::create($validatedData);
        return redirect('/admin/manageuser')->with('alertSuccessAdd', 'Pegawai Berhasil Di Tambahkan!');

    
    }

    public function deleteuser($id){   
       $data = Pegawai::findOrfail($id);
        $data->forceDelete();
        return redirect('/admin/manageuser')->with('alertSuccessDelete', 'Pegawai Berhasil Di Hapus!');
    }

    public function editUser($id){
        $data = Pegawai::findOrfail($id);
        return view('admin.editUser',[
            'title' => 'Edit User',
            'pegawai' => $data
        ]);
    }

    public function updateUser(Request $request, $id){
        $data = Pegawai::findOrfail($id);
        if($request['password'] === NULL) {
            $request['password'] = $data['password'];
        }else{
            $request['password'] = bcrypt($request['password']);    
        }

        $request['email'] = strtolower($request['email']);
        $username = explode("@",$request['email']);
        $request['username'] = $username[0];

        if($request['email'] === $data['email']){
            $cekemail = 'required';
        } else{
            $cekemail = 'required|unique:pegawai';
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => $cekemail,
            'password' => 'required',
            'role' => 'required',
            'username' => 'required'

        ]);
        $data->update($validatedData);
        return redirect('/admin/manageuser')->with('alertSuccessAdd', 'Data Pegawai Berhasil Di Ubah!');
    }
    public function manageTrash()
    {
        $data = Pegawai::onlyTrashed()->get();
        return view('admin.manageTrashUser',[
            'title' => 'Manage Users',
            'dataPegawai' => $data
        ]);
    }

    public function restoreUser($id){
        $data = Pegawai::onlyTrashed()->where('id',$id);
        $data->restore();
        return redirect('/admin/manageuser')->with('alertSuccessAdd', 'Data Pegawai Berhasil Di Kembalikan!');
    }

    public function restoreall(){
        $data = Pegawai::onlyTrashed();
        $data->restore();
        return redirect('/admin/manageuser')->with('alertSuccessAdd', 'Semua Data Pegawai Berhasil Di Kembalikan!');
    }
    public function forcedelete($id){
        $data = Pegawai::onlyTrashed()->where('id',$id);
        $data->forceDelete();
        return redirect('/admin/managetrash')->with('alertSuccessDelete', 'Data Pegawai Berhasil Di Hapus Permanent!');
    }


    public function account(){
        return view('admin.AccountSettings',[
            'title' => 'Pengaturan Akun',
           
        ]);
    }
    public function Storeaccount(Request $request){
        $data = Pegawai::findOrfail($request['id']);
        
        $passlama = $data['password'];
        $inputpassLama = $request['oldpassword'] ;
        
        if (Hash::check($inputpassLama, $passlama)) {
             $request['password'] = bcrypt($request['password']);   
            $validatedData = $request->validate([
                'password' => 'required',
    
            ]);
            $data->update($validatedData);

            return redirect()->back()->with('alertSuccess','Password Berhasil Di ubah');
        }
        return redirect()->back()->with('alertFail','Password Berbeda');
     
    }
}
