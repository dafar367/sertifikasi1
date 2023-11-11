<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //

    public function store_transaksi()
    {
        $transaksi = new transaksi();
        $transaksi->id_kendaraan = request('id_kendaraan');
        $transaksi->id_customer = request('id_customer');

        $transaksi->save();
        return redirect()->route('transaksi')->with('success', 'Transaksi Berhasil Di Tambahkan!');
    }

}
