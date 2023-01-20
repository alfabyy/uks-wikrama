<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('rombel');
            $table->string('rayon');
            $table->text('alamat');
            $table->date('tanggal_kunjungan');
            $table->string('suhu');
            $table->string('tensi_darah');
            $table->enum('makan_pagi', ['Sudah','Belum']);
            $table->enum('makan_siang', ['Sudah','Belum']);
            $table->enum('makan_malam', ['Sudah','Belum']);
            $table->enum('obat_pagi', ['Sudah','Belum']);
            $table->enum('obat_siang', ['Sudah','Belum']);
            $table->enum('obat_malam', ['Sudah','Belum']);
            $table->string('jenis_obat_pagi');
            $table->string('jenis_obat_siang');
            $table->string('jenis_obat_malam');
            $table->string('jumlah_obat_pagi');
            $table->string('jumlah_obat_siang');
            $table->string('jumlah_obat_malam');
            $table->text('keluhan');
            $table->enum('status_pasien', ['Rawat','Rawat Sementara','Dirujuk','Sembuh']);
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
        Schema::dropIfExists('pasien');
    }
}
