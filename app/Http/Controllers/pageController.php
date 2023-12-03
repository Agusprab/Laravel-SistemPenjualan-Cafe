<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {

        return view('login');
    }

    public function loginProses(Request $request)
    {


        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $dicari = "@";
        $usernameOremail = 'username';
        if (preg_match("/$dicari/i", $request->email)) {
            $usernameOremail = 'email';
        }



        if (Auth::guard('pegawai')->attempt([$usernameOremail => $request->email, 'password' => $request->password])) {
            $role = Auth::guard('pegawai')->user()->role;

            return redirect('/admin');
        }
        return redirect('/login')->with('login', 'Email / Password Salah!');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {

        Auth::guard('pegawai')->logout();

        return redirect('/login');
    }
}
