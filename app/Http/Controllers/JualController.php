<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musik;
use App\Models\Jual;
use PDF;
use Carbon\Carbon;
class JualController extends Controller
{
    // index
    public function index() {
        $kode = 'LM0';
        $jual = Jual::latest()->simplePaginate(2);
        return view('penjualan.index',['juals' => $jual,'kode' => $kode]);
    }
    // destroy
    public function destroy($id) {
        $jual = Jual::findOrFail($id);
        $jual->delete();
        return redirect('/jual')->with('mssg','Laporan penjualan di hapus');
    }
    // create
    public function create() {
        $musik = musik::all();
        return view('penjualan.create',['musiks' => $musik]);
    }
    // store
    public function store() {
        $jual = new Jual();
        $jual->jumlah = \request('jumlah');
        $id = \request('musik');
        $musik = musik::where('id',$id)->first();
        if($musik->stok >= $jual->jumlah && $jual->jumlah > 0) {
            $musik->stok = $musik->stok - $jual->jumlah;
            $jual->nama_brg = $musik->nama;
            $jual->gambar = $musik->gambar;
            $musik->save();
            $jual->save();
        } elseif($musik->stok < $jual->jumlah) {
            return \redirect('/jual/create')->with('mssg','stok habis');
        } else {
            return \redirect('/jual/create')->with('mssg','angka tidak valid');
        }
        error_log($jual->nama_brg);
        return redirect('/jual');
    }
    // search
    public function search() {
        $kode = 'LM0';
        $search = \request('search');
        $jual = Jual::where('nama_brg','like','%'.$search.'%')->paginate(2);
        return view('penjualan.index',['juals' => $jual,'kode' => $kode]);
    }


    // print
    // public function print (Request $request, $data) {
    //     return $request->user()->downloadInvoice($data, [
    //         musik::all()
    //     ]);
    // }

    // public function print()
    // {
    //       // mengambil data dari dataase
    // $data = Jual::all();
     
    // $config = [
    //   'format' => 'A4-P', // Landscape
    //     // 'margin_top' => 0
    //     'isRemoteEnabled' => true
    // ];
        
    // $pdf = PDF::loadview('penjualan.pdf.print',['juals' => $data],$config);
	// // OR :: $pdf = PDF::loadview('pdf_data_member',$data,[],['format' => 'A4-L']);
    // return $pdf->stream();
    // }

}
