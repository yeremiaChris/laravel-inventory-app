@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Tambah Musik</h5>
</div>
<form class="mt-5" method="POST"  enctype="multipart/form-data" action="/musik/{{$musik->id}}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" >Nama Barang</label>
                <input type="text" value="{{ $musik->nama  }}" class="form-control" id="nama" placeholder="Masukan nama barang" name="nama">
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select class="custom-select select" id="supplier" name="supplier_id" >
                    <option value="{{ $nama->id }}" >{{$nama->nama}}</option>
                    @foreach($suppliers as $supplier )
                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                    @endforeach
                </select>            
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" value="{{ $musik->stok }}" class="form-control" id="stok" placeholder="stok barang" name="stok">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" value="{{ $musik->harga }}" class="form-control" id="harga" placeholder="harga beli barang" name="harga">
            </div>
        </div>
        <div class="col-md-6 mt-4 ">
            <div class="gambar" >
                <img src="" alt="" class="img" >
                <input type="file" name="gambar" style="display: none"  class="inputGambar" value="{{ $musik->gambar }}">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    <span class="reset btn btn-danger mt-4" >reset</span>
</form>
@endsection 