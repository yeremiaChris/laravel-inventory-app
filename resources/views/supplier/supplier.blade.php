@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Daftar Supplier</h5>
</div>
<div class="row mt-3 d-flex justify-content-between">
    <a href="{{ route('supplier.create') }}" class="btn btn-outline-primary"> Tambah Supplier</a>
    <form class="form-inline my-2 my-lg-0" action="{{ route('supplier.search') }}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="row">
    
    <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col table">Kode  &darr;&uarr; </th>
            <th scope="col">Gambar &darr;&uarr;</th>
            <th scope="col">Nama Supplier &darr;&uarr;</th>
            <th scope="col">Alamat &darr;&uarr;</th>
            <th scope="col">Telpon &darr;&uarr;</th>
            <th scope="col">Aksi &darr;&uarr;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <th>{{$kode}}{{ $supplier->id }}</th>
                <td> <img src="/storage/{{ $supplier->gambar }}" alt=""> </td>
                <td>{{ $supplier->nama }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>{{ $supplier->telpon }}</td>
                
                <td> 
                    <form action="{{ route('supplier.destroy',$supplier->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-primary">Edit</a> 
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>

<div class="row">
    {{ $suppliers->links() }}
</div>
@endsection 