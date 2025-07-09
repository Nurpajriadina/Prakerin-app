<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajriaLowongan extends Model
{
    use HasFactory;

    protected $fillable = ['perusahaan_id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'];

    public function perusahaan()
    {
        return $this->belongsTo(PajriaPerusahaan::class, 'perusahaan_id');
    }

    public function pelamars()
    {
        return $this->hasMany(PajriaPelamarMagang::class, 'lowongan_id');
    }
}

