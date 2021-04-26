<?php

namespace App\Http\Controllers;

use App\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $ujian = Ujian::all();
        return view('ujian', ['ujian' => $ujian]);
    }

    public function tambah()
    {
        return view('ujian_tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_mk' => 'required',
            'dosen' => 'required',
            'jumlah_soal' => 'required',
            'keterangan' => 'required'
        ]);

        Ujian::create([
            'nama_mk' => $request->nama_mk,
            'dosen' => $request->dosen,
            'jumlah_soal' => $request->jumlah_soal,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/ujian');
    }
}