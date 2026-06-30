<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Obat extends Model
{
    /**
     * Field yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
        'kategori_id',
        'kode_obat',
        'nama_obat',
        'deskripsi',
        'stok',
        'harga_jual',
        'gambar',
    ];

    /**
     * Relasi ke Kategori
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Relasi ke Detail Penjualan
     */
    public function detailPenjualans(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}