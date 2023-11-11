<?php

namespace App\Http\Controllers;

use App\Models\kendaraan;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    //

    public function kendaraan_fill_page()
    {
        return view('kendaraan.fill_kendaraan');
    }

    public function store_to_kendaraan_page(Request $request)
    {
        $option_selected = $request->input('kendaraan_page');


        $data = "";

        if ($option_selected == 'Mobil') {
            // return redirect()->route('mobil_page');
            $data = "Mobil";
        } elseif ($option_selected == 'Truck') {
            // return redirect()->route('truc_page');
            $data = "Truck";
        } elseif ($option_selected == 'Motor') {
            // return redirect()->route('motor_page');
            $data = "Motor";
        }

        return redirect()->route('kendaraan_fill_page')->with('data', $data);
    }

    public function store_kendaraan(Request $request)
    {

        $kendaraan = new kendaraan();
        $kendaraan->nama_model_kendaraan = $request->input('nama_model_kendaraan');
        $kendaraan->tahun = $request->input('tahun');
        $kendaraan->jumlah_penumpang = $request->input('jumlah_penumpang');
        $kendaraan->manufaktur = $request->input('manufaktur');
        $kendaraan->harga = $request->input('harga');

        if ($request->has('bahan_bakar')) {
            $kendaraan->bahan_bakar = $request->input('bahan_bakar');
        }

        if ($request->has('luas_bagasi')) {
            $kendaraan->luas_bagasi = $request->input('luas_bagasi');
        }

        if ($request->has('jumlah_roda')) {
            $kendaraan->jumlah_roda = $request->input('jumlah_roda');
        }

        if ($request->has('luas_area_kargo')) {
            $kendaraan->luas_area_kargo = $request->input('luas_area_kargo');
        }

        if ($request->has('ukuran_bagasi')) {
            $kendaraan->ukuran_bagasi = $request->input('ukuran_bagasi');
        }

        if ($request->has('kapasitas_bensin')) {
            $kendaraan->kapasitas_bensin = $request->input('kapasitas_bensin');
        }

        $kendaraan->save();
        return redirect()->route('kendaraan');
    }
}
