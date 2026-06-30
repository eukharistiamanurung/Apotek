<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'user_id',
        'kode_transaksi',
        'tanggal',
        'total_harga',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Detail Penjualan
     */
    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}