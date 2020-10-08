@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Penjualan</h5>
</div>
<div class="row mt-3 d-flex justify-content-between">
    <a href="{{ route('jual.print')}}" class="btn btn-primary">Print Laporan</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="row">
    
    <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col table">Kode Jual  &darr;&uarr; </th>
            <th scope="col table">Gambar &darr;&uarr; </th>
            <th scope="col">Nama Barang &darr;&uarr;</th>
            <th scope="col">Jumlah Jual &darr;&uarr;</th>
            <th scope="col">Waktu Penjualan &darr;&uarr;</th>
            <th scope="col">Aksi &darr;&uarr;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($juals as $jual)
            <tr>
                <th>{{ $kode }}{{ $jual->id }}</th>
                <td> <img src="/storage/{{ $jual->gambar }}" alt=""> </td>
                <td>{{ $jual->nama_brg }}</td>
                <td>{{ $jual->jumlah }}</td>
                <td>{{ $jual->created_at->format('d M Y') }}</td>
                <td> 
                    <form action="{{ route('jual.destroy',$jual->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection 