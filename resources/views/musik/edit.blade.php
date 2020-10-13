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
                <label for="hargaBeli">Harga Beli</label>
                <input type="number" value="{{ $musik->hargaBeli }}" class="form-control" id="hargaBeli" placeholder="harga beli barang" name="hargaBeli">
            </div>
            <div class="form-group">
                <label for="hargaJual">Harga Jual</label>
                <input type="number" value="{{ $musik->hargaJual }}" class="form-control" id="hargaJual" placeholder="harga beli barang" name="hargaJual">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    <span class="reset btn btn-danger mt-4" >reset</span>
</form>
@endsection 