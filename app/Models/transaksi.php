<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class transaksi extends Model
{
    use HasFactory;


    protected $table = 'transaksi';
    protected $fillable = ['id_kendaraan', 'id_customer'];

    public function kendaraan()
    {
        // return $this->belongsTo('App\Models\kendaraan', 'id_kendaraan', 'id');
        return $this->belongsTo(kendaraan::class, 'id_kendaraan');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\customer', 'id_customer', 'id');
    }
}
