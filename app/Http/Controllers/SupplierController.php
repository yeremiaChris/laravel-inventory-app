<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // index
    public function index() {
        $supplier = Supplier::latest()->get();
        return view('supplier.supplier',['suppliers' => $supplier]);
    }
    // hapus atau destroy
    public function destroy($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('/supplier')->with('mssg','Supplier sudah di hapus');
    }   
    // create
    public function create() {
        return view('supplier.create');
    }
    // store data
    public function store(Request $request) {
        $supplier = new Supplier();
        $supplier->nama = \request('nama');
        $supplier->alamat = \request('alamat');
        $supplier->telpon = \request('telpon');
        $supplier->gambar = $request->gambar->store('supplier','public');

        $supplier->save();
        return \redirect('/supplier')->with('mssg','Supplier berhasil di tambahkan');

    }
}
