<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTable extends Migration
{
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik', 100);
            $table->string('nama_hewan', 100);
            $table->string('foto_hewan')->nullable();
            $table->enum('kategori_hewan', ['Anjing', 'Kucing']);
            $table->string('ras', 100)->nullable();
            $table->enum('jenis_kelamin', ['Jantan', 'Betina']);
            $table->integer('usia_hewan')->nullable();
            $table->string('kontak', 15)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konsultasi');
    }
}

