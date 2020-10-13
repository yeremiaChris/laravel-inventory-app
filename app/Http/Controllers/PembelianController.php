<?php

namespace App\Http\Controllers;
use App\Models\pembelian;
use App\Models\musik;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index() {
        $kode = 'BL0';
        $beli = pembelian::latest()->simplePaginate(2);
        return view('pembelian.index',['kode' => $kode,'belis' => $beli]);
    }

    public function create() {
        $musik = musik::all();
        return view('pembelian.create',['musiks' => $musik]);
    }
    // store
    public function store() {
        $beli = new pembelian();
        $beli->jumlah = \request('jumlah');
        $id = \request('musik');
        $musik = musik::where('id',$id)->first();
        if ($beli->jumlah <= 0) {
            return \redirect('/beli/create')->with('mssg','angka tidak valid');
        } else {
            $musik->stok += $beli->jumlah;
            $beli->nama_brg = $musik->nama;
            $musik->save();
            $beli->save();
            return \redirect('/')->with('mssg','brg berhasil di beli');
        }

    }

}
