<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row justify-content-center">
                <h1>Laporan Penjualan</h1>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col table">Kode Jual  </th>
                            <th scope="col table">Gambar </th>
                            <th scope="col">Nama Barang </th>
                            <th scope="col">Jumlah Jual </th>
                            <th scope="col">Waktu Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($juals as $jual)
                            <tr>
                                <th>{{ $jual->id }}</th>
                                <td> <img src="/storage/{{ $jual->gambar }}" alt=""> </td>
                                <td>{{ $jual->nama_brg }}</td>
                                <td>{{ $jual->jumlah }}</td>
                                <td>{{ $jual->created_at->format('d M Y') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
