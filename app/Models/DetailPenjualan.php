<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    protected $fillable = [
        'penjualan_id',
        'obat_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    /**
     * Relasi ke Penjualan
     */
    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class);
    }

    /**
     * Relasi ke Obat
     */
    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
} 