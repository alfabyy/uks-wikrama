<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class,'nama_rayon', 'nama_rayon');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class,'nama_rombel', 'nama_rombel');
    }
}
