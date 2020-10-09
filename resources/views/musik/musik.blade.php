@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Daftar Barang</h5>
</div>
<div class="row mt-3 d-flex justify-content-between">
    <a href="{{ route('musik.create') }}" class="btn btn-outline-primary"> Tambah Barang</a>
    <form class="form-inline my-2 my-lg-0" action="{{ route('musik.search') }}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="row">
    
    <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col table">Kode  &darr;&uarr; </th>
            <th scope="col table">Gambar &darr;&uarr; </th>
            <th scope="col">Nama Barang &darr;&uarr;</th>
            <th scope="col">Kode Supplier &darr;&uarr;</th>
            <th scope="col">Stok &darr;&uarr;</th>
            <th scope="col">Harga &darr;&uarr;</th>
            <th scope="col">Aksi &darr;&uarr;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($musiks as $musik)
            <tr>
                <th>{{$kode}}{{ $musik->id }}</th>
                <td> <img src="/storage/{{ $musik->gambar }}" alt=""> </td>
                <td>{{ $musik->nama }}</td>
                <td>{{ $kodeSup }}{{ $musik->supplier_id }}</td>
                <td>{{ $musik->stok }}</td>
                <td>@currency($musik->harga)</td>
                <td> 
                    <form action="{{ route('musik.destroy',$musik->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('musik.edit',$musik->id) }}" class="btn btn-primary">Edit</a> 
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row">
    {{$musiks->links()}}
</div>
@endsection 