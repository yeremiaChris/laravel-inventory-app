@extends('layouts.layout')

@section('content')
<div class="row">
    <h5 class="mt-3">Jual Barang</h5>
</div>
<form class="mt-5" method="POST" action="{{route('jual.store')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="supplier">Barang yang mau di jual</label>
                <select class="custom-select select" id="supplier" name="musik">
                    <option selected>Pilih...</option>
                    @foreach($musiks as $musik )
                        <option value="{{ $musik->id }}">{{ $musik->nama }}</option>
                    @endforeach
                </select>            
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="stok" placeholder="Jumlah jual" name="jumlah">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-4">Jual</button>
    <span class="reset btn btn-danger mt-4" >reset</span>
</form>
@endsection 