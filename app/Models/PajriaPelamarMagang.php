<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PajriaPelamarMagang extends Model
{
    use HasFactory;

    protected $table = 'pajria_pelamar_magang';
    protected $fillable = ['pelamar_id', 'lowongan_id', 'tanggal_daftar', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(PajriaLowongan::class, 'lowongan_id');
    }

    public function laporans()
    {
        return $this->hasMany(PajriaLaporan::class, 'pelamar_id');
    }
}

