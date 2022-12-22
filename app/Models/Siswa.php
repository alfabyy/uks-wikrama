<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table  = 'siswa';
    protected $guarded = [];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class,'nama_rayon', 'nama_rayon');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class,'nama_rombel', 'nama_rombel');
    }
}
