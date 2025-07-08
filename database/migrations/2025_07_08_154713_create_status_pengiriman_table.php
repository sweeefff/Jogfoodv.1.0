<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_pengiriman', function (Blueprint $table) {
            $table->id('id_status');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_kurir')->nullable()->constrained('users')->onDelete('set null');
            $table->string('id_transaksi', 50);
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            $table->enum('status_pembayaran', ['belum dibayar', 'dibayar']);
            $table->enum('status_pengiriman', ['menunggu', 'dikirim', 'selesai', 'gagal', 'dibatalkan']);
            $table->string('nama_penerima')->nullable();
            $table->string('foto')->nullable();
            $table->string('alasan')->nullable();
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->timestamp('tanggal_dikirim')->nullable();
            $table->timestamp('tanggal_diterima')->nullable();
            $table->timestamp('tanggal_update')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pengiriman');
    }
};
