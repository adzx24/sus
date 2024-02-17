<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Models\transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function login () {
        return view('login');
    }
    public function postlogin (Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($data)){
            $user = auth()->user();
            // if($user->status == 'tidak_aktif'){
            //     auth()->logout();
            //     return redirect()->back()->with('m','Akun tidak aktif');
            // }
            // $status = auth()->user();
            // if($status->status == 'aktif'){
            //     return redirect();
            // }else

            if($user->role == 'kasir'){
                return redirect('kasir')->with('m','Berhasil login sebagai ' . $user->name);
            }elseif($user->role == 'admin'){
                return redirect('home')->with('m','Berhasil login sebagai ' . $user->name);
            }elseif($user->role == 'owner'){
                return redirect('reportowner')->with('m','Berhasil login sebagai ' . $user->name);
            }
        }
        return redirect('/')->with('m','Email atau password salah');
    }
    public function logout () {
        auth()->logout();
        return redirect('/')->with('m','Berhasil logout');
    }
    public function log () {
        $log = log::all();
        return view('log',compact('log'));
    }
    public function user () {
        $data = User::all();
        return view('user.user',compact('data'));
    }
    public function postuser (Request $request) {
        $request->validate([
            'name'=>'required',
            // 'role'=>'required',
            // 'email'=>'required',
            'password'=>'required',

        ]);
        User::create([
            'name'=>$request->name,
            // 'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'kasir'
        ]);
        return redirect('user')->with('m','Berhasil tambah  user');
    }
    public function edituser (User $user) {

        return view('user.edit',compact('user'));
    }
    public function postedituser(Request $request, User $user)  {
        $data =  $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        $user->update($data);
        return redirect('user')->with('m','Berhasil edit  user');
    }
    // public function aktif (User $user) {
    //     $user->update([
    //         'status'=>'aktif'
    //     ]);
    //     return redirect('user')->with('m','aktifkan'. $user->name);

    // }
    // public function nonaktif (User $user) {
    //     $user->update([
    //         'status'=>'tidak_aktif'
    //     ]);
    //     return redirect('user')->with('m','nonaktifkan'. $user->name);
    // }
    public function hapususer (User $user) {
        $user->delete();
        return redirect('user')->with('m','Berhasil hapus user');
    }

}
