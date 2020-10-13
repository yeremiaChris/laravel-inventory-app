@extends('layouts.layout')

@section('content')


<style>
    @media print {
        .title {
            display: none;
        }
    }
</style>

<div class="row">
    <h2 class="mt-3">Laporan Penjualan</h2>
</div>
<div class="row mt-3 d-flex justify-content-between title">
    <a href="{{ route('jual.print') }}" class="btn btn-outline-primary">print</a>
    <form class="form-inline my-2 my-lg-0" action="{{ route('jual.search') }}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="row" id="content" class="content">
    <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col table">Kode beli  &darr;&uarr; </th>
            <th scope="col">Nama Barang &darr;&uarr;</th>
            <th scope="col">Jumlah beli &darr;&uarr;</th>
            <th scope="col">Waktu Penjualan &darr;&uarr;</th>
        </tr>
    </thead>
    <tbody >
        @foreach($belis as $beli)
            <tr>
                <th>{{ $kode }}{{ $beli->id }}</th>
                <td>{{ $beli->nama_brg }}</td>
                <td>{{ $beli->jumlah }}</td>
                <td>{{ $beli->created_at->format('d F Y') }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
<div class="row">
    {{ $belis->links() }}
</div>
@endsection 