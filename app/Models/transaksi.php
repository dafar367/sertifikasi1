<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transaksi';
    protected $fillable = ['id_kendaraan', 'id_customer'];

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\kendaraan', 'id_kendaraan', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\customer', 'id_customer', 'id');
    }
}
