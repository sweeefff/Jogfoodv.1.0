<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_detail'); // Kolom baru ditambahkan di sini
            $table->tinyInteger('rating');
            $table->text('komentar')->nullable();
            $table->timestamps();

            // Pastikan kolom FK punya index
            $table->index('id_user');
            $table->index('id_menu');
            $table->index('id_detail'); // Index untuk kolom baru

            // FOREIGN KEY
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('cascade');
            $table->foreign('id_detail')->references('id_detail')->on('detail_table')->onDelete('cascade'); // Ganti 'detail_table' dengan nama tabel yang sesuai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
