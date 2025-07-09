<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajriaPerusahaan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'email', 'no_telepon'];

    public function lowongans()
    {
        return $this->hasMany(PajriaLowongan::class, 'perusahaan_id');
    }
}

