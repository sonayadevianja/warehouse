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
        Schema::create('barangkeluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')->unsigned();
            $table->date('tanggal_keluar');
            $table->integer('amount');
            $table->timestamps();
        });

        Schema::table('barangkeluars', function (Blueprint $table) {
            // $table->unsignedBigInteger('jenis_id');
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangkeluars');
    }
};
