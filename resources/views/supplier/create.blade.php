@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Tambah Supplier</h5>
</div>
<form class="mt-5" method="POST"  enctype="multipart/form-data" action="/supplier">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" >Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama Perusahaan" name="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
            </div>
            <div class="form-group">
                <label for="telpon">NoTelp </label>
                <input type="text" class="form-control" id="telpon" placeholder="no telpon" name="telpon">
            </div>
        </div>
        <div class="col-md-6 mt-4 ">
            <div class="gambar">
                <img src="/img/camera.png" alt="" class="img" >
                <input type="file" name="gambar" style="display: none"  class="inputGambar">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    <span class="reset btn btn-danger mt-4" >reset</span>
</form>
@endsection 