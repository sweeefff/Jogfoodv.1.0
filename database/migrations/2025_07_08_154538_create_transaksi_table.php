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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi', 50)->primary();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->integer('total_harga');
            $table->enum('status_transaksi', ['pending','lunas','gagal','kadaluwarsa','dibatalkan']);
            $table->string('snap_token')->nullable();
            $table->timestamp('snap_token_created_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
