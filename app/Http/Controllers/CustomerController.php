<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\kendaraan;
use App\Models\transaksi;
use Barryvdh\Debugbar\Facades\Debugbar;
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
            Debugbar::error($e);
            return redirect(route('home'))->with('error',  $e->getMessage());
        }
    }

    public function detail_transaksi($id)
    {
        // retrieve the id from the view
        $customer = customer::findOrFail($id);

        $transaksi = transaksi::where('id_customer', $id)->get();

        $kendaraan = kendaraan::all();

        return view('customer.detail_transaksi', compact('customer', 'transaksi', 'kendaraan'));

    }

    public function edit_transaksi($id, Request $req)
    {
        //update
        $nama_kendaraan = $req->input('id_kendaraan');
        $transaksi = transaksi::find($id);
        $transaksi->id_kendaraan = $nama_kendaraan;
        $transaksi->save();

        return redirect()->back()->with('success', 'Pembukuan telah diupdate');
    }

    public function edit_customer($id, Request $request)
    {
        $customer = customer::find($id);
        $inputValues = $request->only([
            'nama',
            'alamat',
            'id_card',
            'no_telp'
        ]);

        // Update berdasarkan inputValues
        $customer->update($inputValues);


        // Save the changes
        $customer->save();




        return redirect()->route('home')->with('success', 'customer telah diupdate');
    }

    public function delete_transaksi($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->delete();

        $customer_id = $transaksi->customer->id;

        return redirect()->back()->with('success', 'Pembukuan telah diupdate');
    }

    public function delete_customer($id)
    {
        $customer = customer::find($id);
        $customer->delete();

        return redirect()->route('home');
    }
}
