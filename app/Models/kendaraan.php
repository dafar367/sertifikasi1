<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kendaraan extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->hasMany('App\Models\transaksi', 'id_kendaraan', 'id');
    }
}
