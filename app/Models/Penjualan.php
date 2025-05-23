<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'pelanggan_id', 'tanggal_penjualan', 'total_harga'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function detailPenjualans() {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id');
    }
}
