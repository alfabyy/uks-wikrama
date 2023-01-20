<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('rayon');
            $table->string('rombel');
            $table->string('alamat');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('penyakit_bawaan')->nullable();
            $table->string('alergi')->nullable();
            $table->string('hobi');
            $table->string('makanan_kesukaan');
            $table->text('catatan')->nullable();
            $table->string('jumlah_kunjungan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
