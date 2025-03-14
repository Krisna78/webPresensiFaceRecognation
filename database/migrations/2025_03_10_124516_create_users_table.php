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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum("role",['admin','guru','siswa']);
            $table->text('face_encoding');
            $table->string('no_hp');
            $table->unsignedBigInteger('id_ortu')->nullable();
            $table->foreign('id_ortu')->references('id_ortu')->on('ortu')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
