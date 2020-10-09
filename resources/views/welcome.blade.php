@extends('layouts.layout')

@section('content')
        <div class="row mt-2">
            <div class="col-md-5 mr-1 mb-3">
                <div class="card " >
                    <div class="petak">
                        <p>Musik</p>
                        <img src="/img/logo.png" alt="">
                    </div>
                    <div class="card-body">
                        <a href="{{ route('musik.index') }}" class="btn btn-outline-primary">Lihat Barang</a>
                    </div>
                </div>
            </div>
        </div>
@endsection 