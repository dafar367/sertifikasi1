<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //

    public function store_transaksi(Request $request)
    {
        $transaksi = new transaksi();
        $transaksi->id_kendaraan = request('id_kendaraan');
        $transaksi->id_customer = request('id_customer');


        Debugbar::info($transaksi);
        $transaksi->save();
        return redirect()->route('transaksi')->with('success', 'Transaksi Berhasil Di Tambahkan!');
    }

    public function delete_history_transaksi($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi')->with('success', 'Transaksi Berhasil Di Tambahkan!');

    }

}
