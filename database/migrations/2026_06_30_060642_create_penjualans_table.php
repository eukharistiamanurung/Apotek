<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('detail_penjualans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('penjualan_id')
                  ->constrained('penjualans')
                  ->cascadeOnDelete();

            $table->foreignId('obat_id')
                  ->constrained('obats')
                  ->cascadeOnDelete();

            $table->integer('jumlah');

            $table->decimal('harga', 15, 2);

            $table->decimal('subtotal', 15, 2);

            $table->timestamps();

        });
    }

    /**
     * Hapus tabel.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};