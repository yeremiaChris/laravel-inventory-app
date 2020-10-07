<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musik;
use App\Models\Supplier;
class MusikController extends Controller
{
    // index
    public function index() {
        $musik = musik::latest()->get();
        $kode = 'MB00';
        return view('musik.musik',['musiks' => $musik,'kode' => $kode]);
    }
    // destroy/delete
    public function destroy($id) {
        $musik = musik::findOrFail($id);
        $musik->delete();
        return redirect('/musik')->with('mssg','Barang sudah di hapus');
    }
    // create
    public function create() {
        $supplier = Supplier::all();
        return view('musik.create',['suppliers' => $supplier]);
    }
    // store data
    public function store(Request $request) {
        $musik = new musik();
        $musik->nama = \request('nama');
        $musik->supplier_id = \request('supplier');
        $musik->gambar = $request->gambar->store('image','public');
        $musik->harga = \request('harga');
        $musik->stok = \request('stok');

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
        // musik::where('id',$id)->update(
        //     ['supplier_id' => \request('supplier_id')],
        //     ['name' => \request('name')],
        //     // ['gambar' => $request->gambar->store('image','public')],
        //     ['harga' => \request('harga')],
        //     ['stok' => \request('stok')],

        // );
        // $musik->updateOrInsert(
        //     ['']
        // );
        $musik = musik::findOrFail($id);
        $musik->nama = \request('nama');
        $musik->supplier_id = \request('supplier_id');
        $musik->gambar = \request('gambar');
        $musik->harga = \request('harga');
        $musik->stok = \request('stok');
        
        $musik->save();
        return redirect('/musik')->with('mssg','Barang berhasil di update');
    }


}
