<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use App\Models\musik;
use App\Models\Supplier;
class MusikController extends Controller
{
    // index
    public function index() {
        $data = musik::all();
        $musik = musik::latest()->simplePaginate(2);
        $jumlahMusik = count($data);
        $kodeSup = 'MS00';
        $kode = 'MB00';
        return view('musik.musik',['jumlah' => $jumlahMusik,'musiks' => $musik,'kode' => $kode,'kodeSup' => $kodeSup]);
    }
    // destroy/delete
    public function destroy($id) {
        $musik = musik::findOrFail($id);
        $musik->delete();
        return redirect('/musik')->with('hps','Barang sudah di hapus');
    }
    // create
    public function create() {
        $supplier = Supplier::all();
        return view('musik.create',['suppliers' => $supplier]);
    }
    // store data
    public function store() {
        $musik = new musik();
        $musik->nama = \request('nama');
        $musik->supplier_id = \request('supplier');
        $musik->hargaBeli = \request('hargaJual');
        $musik->hargaJual = \request('hargaBeli');

        $musik->save();

        // dd($request->file('gambar'));
        // dd($request->hash_file('gambar'));
        // dd($request->gambar->store('img','public'));
        return \redirect('/musik')->with('mssg','Barang berhasil di tambahkan');
    }
    // edit
    public function edit($id) { 
        $musik = musik::findOrFail($id);
        $supplier = Supplier::all(); 
        $nama = $supplier->where('id',$musik->supplier_id)->first();
        error_log($nama);
        return view('musik.edit',['musik' => $musik,'suppliers' => $supplier,'nama' => $nama]);
    }
    // update
    public function update(Request $request,$id ) {
        $musik = musik::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $musik->gambar = $request->gambar->store('image','public');          
        }
        $musik->nama = \request('nama');
        $musik->supplier_id = \request('supplier_id');
        $musik->harga = \request('harga');
        $musik->stok = \request('stok');        
        $musik->save();
        return redirect('/musik')->with('mssg','Barang berhasil di update');
    }
    // jualLangsung barang
    public function jualLangsung($id) {
        $musik = musik::findOrFail($id);
        if($musik->stok >= 1) {
            $musik->stok = $musik->stok - 1;
            $musik->save();
            return redirect('/musik')->with('mssg','Barang berhasil di Jual');
        } else {
            return redirect('/musik')->with('mssg','Barang Habis');
        };

    }
    // jual Form
    public function search() {
        $search = \request('search');
        $kodeSup = 'MS00';
        $kode = 'MB00';
        $musik  = musik::where('nama','like','%'.$search. '%')->simplePaginate(2);
        return view("musik.musik",['musiks' => $musik,'kode' => '$kode','kodeSup' => $kodeSup]);
    }

}
