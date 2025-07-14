<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajriaLaporan extends Model
{
    use HasFactory;

    protected $fillable = ['pelamar_id', 'isi_laporan', 'tanggal'];

    public function pelamar()
    {
        return $this->belongsTo(PajriaPelamarMagang::class, 'pelamar_id');
    }
}
