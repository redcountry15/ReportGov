<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use PDF;


class AdminController extends Controller
{
    
    public function index(){
       

        return view('home_admin');
    }

    public function inbox(){

        $mail= DB::table('pengaduan_masyarakat')->where('status','=',1)->get();
        return view('inbox_admin',['mail' => $mail]);
    }

    public function inbox_confirmed(){
        $mail= DB::table('pengaduan_masyarakat')->where('status','=',2)->get();
        return view('inbox_admin_confirmed',['mail' => $mail]);
    }

        public function confirmed(Request $req){
            DB::table('pengaduan_masyarakat')->where('id_pengaduans',$req->id_pengaduans)->update([
                'status' => 2
                // 'judul_pengaduan' => $request->judul_pengaduan,
                // 'isi_pengaduan' => $request->isi_pengaduan,
                // 'email' => $request->email
            ]);
            return redirect('/admin/mailbox'); 

        }

    public function read($id_pengaduans){
        $mail= DB::table('pengaduan_masyarakat')->where('id_pengaduans',$id_pengaduans)->get();
        return view('readadmin',['mail' => $mail]);
    }

    public function delete($id_pengaduans){
        DB::table('pengaduan_masyarakat')->where('id_pengaduans',$id_pengaduans)->delete();

        return redirect('/admin/mailbox');
    }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function compose(){
        return view('compose_admin');
    }

    public function send_compose(Request $req){

        $admin =  Auth::guard('admin')->user()->email;

        $send = DB::table('tanggapan_fix')->insert([
            'judul'=>$req->subject,
            'isi'=>$req->isi,
            'email_tujuan'=>$req->email,
            'email_asal'=>$admin
        ]);

        return redirect('/admin/mailbox');
    }

    public function print($id_pengaduans){
        $print= DB::table('pengaduan_masyarakat')->where('id_pengaduans',$id_pengaduans)->get();

        // return view('print_laporan',['print'=>$print]);


        $pdf = PDF::loadview('print_laporan',['print'=>$print]);
        // return $pdf->stream();
        return $pdf->download('laporan-pdf');
    }

}
