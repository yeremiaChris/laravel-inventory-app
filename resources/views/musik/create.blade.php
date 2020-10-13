@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Tambah Musik</h5>
</div>
<form class="mt-5" method="POST"  enctype="multipart/form-data" action="/musik">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" >Nama Barang</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama barang" name="nama">
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select class="custom-select select" id="supplier" name="supplier">
                    <option selected>Pilih...</option>
                    @foreach($suppliers as $supplier )
                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                    @endforeach
                </select>            
            </div>
            <div class="form-group">
                <label for="hargaBeli">Harga Beli</label>
                <input type="number" class="form-control" id="harga" placeholder="harga beli barang" name="hargaBeli">
            </div>
            <div class="form-group">
                <label for="hargaJual">Harga Jual</label>
                <input type="number" class="form-control" id="harga" placeholder="harga beli barang" name="hargaJual">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    <span class="reset btn btn-danger mt-4" >reset</span>
</form>
@endsection 