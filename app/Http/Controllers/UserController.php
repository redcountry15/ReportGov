<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        $tanggapan= DB::table('tanggapan_fix')->get();
        return view('home_user',['tanggapan' => $tanggapan]);
    }

    public function inbox(){
        return view('inbox');
    }

    public function compose(){
        return view('compose_email');
    }

    public function store(Request $req){

        $user =  Auth::user()->email;

        DB::table('pengaduan_masyarakat')->insert([
            'judul_pengaduan'=>$req->subject,
            'isi_pengaduan'=>$req->isi,
            'status'=>1,
            'email'=>$user
        ]);

        return redirect('/inbox'); 

    }
     
 
    
}
