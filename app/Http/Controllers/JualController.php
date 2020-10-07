<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musik;

class JualController extends Controller
{
    public function create() {
        $musik = musik::all();
        return view('penjualan.create',['musiks' => $musik]);
    }
    public function store() {
        $jual = \request('musik');
        $musik = musik::where('id',$jual)->first();
        $jumlah = \request('jumlah');
        \error_log($musik->stok);
        if ($musik->stok >= $jumlah && $jumlah > 0) {
            $musik->stok = $musik->stok - $jumlah;
            $musik->save();
            return redirect('/musik')->with('mssg','berhasil jual');
        } 
        if ($musik->stok < $jumlah) {
            return redirect('/jual/create')->with('mssg','lihat stok tidak cukup');
        } 
        if ($jumlah <= 0) 
        {
            return redirect('/jual/create')->with('mssg','angkanya tidak valid');
        }
    }
}
