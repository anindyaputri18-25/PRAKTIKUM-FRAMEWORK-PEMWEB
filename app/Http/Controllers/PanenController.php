<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPanen;

class PanenController extends Controller
{
    public function index()
    {
        $dataPanen = HasilPanen::all();
        return view('panen.index', compact('dataPanen'));
    }
    public function create()
    {
        return view('panen.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_komoditas' => 'required',
            'jumlah_kg'      => 'required|numeric',
            'tanggal_panen'  => 'nullable|date',
        ]);

        // Simpan ke database
        HasilPanen::create([
            'nama_komoditas' => $request->nama_komoditas,
            'jumlah_kg'      => $request->jumlah_kg,
            'tanggal_panen'  => $request->tanggal_panen,
        ]);

        // Redirect ke halaman daftar dengan pesan sukses
        return redirect('/data-panen')->with('success', 'Data berhasil ditambahkan!');
    }
}