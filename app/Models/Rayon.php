<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $table = 'rayon';
    protected $guarded = [];

    // public function pasien()
    // {
    //     return $this->hasMany(Pasien::class);
    // }

    // public function medical_check_up()
    // {
    //     return $this->hasMany(MedicalCheckUp::class);
    // }

    // public function riwayat_penyakit()
    // {
    //     return $this->hasMany(RiwayatPenyakit::class);
    // }
}