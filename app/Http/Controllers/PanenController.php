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
    //
}
