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
    Schema::table('barangs', function (Blueprint $table) {
        $table->string('original_filename')->after('keterangan')->nullable();
        $table->string('encrypted_filename')->after('original_filename')->nullable();
    });
}

/**
* Reverse the migrations.
*/
public function down(): void
{
    Schema::table('barangs', function (Blueprint $table) {
        $table->dropColumn('encrypted_filename');
        $table->dropColumn('original_filename');
    });
}

};
