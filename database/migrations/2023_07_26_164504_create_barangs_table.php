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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->date('tanggal_produksi');
            $table->unsignedBigInteger('jenis_id')->unsigned();
            $table->unsignedBigInteger('barangmasuk_id')->unsigned()->nullable();
            $table->unsignedBigInteger('barangkeluar_id')->unsigned()->nullable();
            $table->integer('stok');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::table('barangs', function (Blueprint $table) {
            // $table->unsignedBigInteger('jenis_id');
            $table->foreign('jenis_id')->references('id')->on('jenis');
            $table->foreign('barangmasuk_id')->references('id')->on('barangmasuks');
            $table->foreign('barangkeluar_id')->references('id')->on('barangkeluars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
