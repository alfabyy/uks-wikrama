<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    
    protected $table  = 'obat';
    protected $guarded = [];

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
