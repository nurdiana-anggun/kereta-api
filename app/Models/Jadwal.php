<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $primaryKey = 'jadwal_id';

    protected $fillable = [
        'kereta_id',
        'nama_perjalanan',
        'stasiun_asal',
        'stasiun_tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
        'jam_tiba',
        'harga_tiket',
        'kuota_tersedia',
    ];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id', 'kereta_id');
    }
}