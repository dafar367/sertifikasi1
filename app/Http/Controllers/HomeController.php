<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\kendaraan;
use App\Models\transaksi;
use Barryvdh\Debugbar\Facades\Debugbar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = customer::all();

        Debugbar::info($customer);
        return view('home', ['customer' => $customer]);
    }

    public function kendaraan()
    {
        $kendaraan = kendaraan::all();
        return view('kendaraan.kendaraan', ['kendaraan' => $kendaraan]);
    }

    public function transaksi()
    {
        $transaksi = transaksi::all();
        $kendaraan = kendaraan::all();
        $customer = customer::all();

        return view('transaksi.transaksi', ['transaksi' => $transaksi, 'kendaraan' => $kendaraan, 'customer' => $customer]);
    }
}
