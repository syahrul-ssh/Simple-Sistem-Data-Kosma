<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mengambil data dari table kosma
        $kosma = DB::table('kosma')->get();
        //mengirim data kosma ke view home
        return view('home',['kosma' => $kosma]);
    }
    public function tambah()
    {
        //memanggil view tambah
        return view('tambah');
    }
    public function store(Request $request)
    {
        // insert data ke table kosma
	    DB::table('kosma')->insert([
		    'kosma_nim' => $request->nim,
		    'kosma_nama' => $request->nama,
		    'kosma_matakul' => $request->matkul,
            'kosma_kelas' => $request->kelas,
            'kosma_semester' => $request->semester
	    ]);
	    // alihkan halaman ke halaman kosma
	    return redirect('/home');
    }
    public function edit($id)
    {
        //mengambil data kosma berdasar id yang dipilih
        $kosma = DB::table('kosma')->where('kosma_id',$id)->get();
        //passing data kosma yang didapat ke view edit.blade.php
        return view('edit',['kosma' => $kosma]);
    }
    public function update(Request $request)
    {
        //update data kosma
        DB::table('kosma')->where('kosma_id',$request->id)->update([
            'kosma_nim' => $request->nim,
		    'kosma_nama' => $request->nama,
		    'kosma_matakul' => $request->matkul,
            'kosma_kelas' => $request->kelas,
            'kosma_semester' => $request->semester
        ]);
        // alihkan halaman ke halaman kosma
	    return redirect('/home');
    }
    public function hapus($id)
    {
        //menghapus data kosma berdasarkan id yang dipillih
        DB::table('kosma')->where('kosma_id',$id)->delete();
        // alihkan halaman ke halaman kosma
	    return redirect('/home');
    }
    public function cari(Request $request)
    {
        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari table kosma sesuai pencarian data
        $kosma =  DB::table('kosma')
        ->where('kosma_nama','like',"%".$cari."%")
        ->paginate();

        //mengirim data kosma ke view
        return view('home', ['kosma' => $kosma]);
    }
}