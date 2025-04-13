<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'stock'];

    public function detailPenjualans() {
        return $this->hasMany(DetailPenjualan::class, 'produk_id');
    }
}
