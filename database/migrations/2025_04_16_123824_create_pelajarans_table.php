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
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->id('id_pelajaran');
            $table->string('nama_pelajaran',30);
            $table->time('jam');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id_user')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajarans');
    }
};
