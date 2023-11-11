<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use HasFactory;


    protected $table = 'customer';
    protected $fillable = ['nama', 'alamat', 'no_telp', 'id_card'];

    public function transaksi()
    {
        return $this->hasMany('App\Models\transaksi','id_customer','id');
    }

}
