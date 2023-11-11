<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class kendaraan extends Model
{
    use HasFactory;


    protected $table = 'kendaraan';
    protected $fillable = [
        'nama_model_kendaraan',
        'tahun',
        'jumlah_penumpang',
        'manufaktur',
        'harga',

        'bahan_bakar',
        'luas_bagasi',

        'jumlah_roda',
        'luas_area_kargo',

        'ukuran_bagasi',
        'kapasitas_bensin',
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_kendaraan');
    }
}
