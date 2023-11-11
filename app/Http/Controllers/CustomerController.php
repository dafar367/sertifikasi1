<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\transaksi;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        try {
            $status = 0;


            $customer = new customer();
            $customer->nama = $request->input('nama');
            $customer->no_telp = $request->input('no_telp');
            $customer->alamat = $request->input('alamat');
            $customer->id_card = $request->input('id_card');



            if ($status == 0) {
                $customer->save();
                return redirect()->route('home')->with('success', 'Kas Masuk telah berhasil disimpan');
            }

            return redirect(route('home'))->with('error', 'Bukti Transaksi harus berekstensi jpg/jpeg/png/pdf dan size dibawah 2 MB');
        } catch (Exception $e) {
            return redirect(route('home'))->with('error',  $e->getMessage());
        }
    }

    public function detail_transaksi($id)
    {
        // retrieve the id from the view
        $customer = customer::findOrFail($id);

        $transaksi = transaksi::where('id_customer', $id)->get();

        return view('customer.detail_transaksi', compact('customer', 'transaksi'));

    }
}
