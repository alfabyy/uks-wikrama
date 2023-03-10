<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $table = 'rombel';
    protected $guarded = [];

    
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }

}
