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
