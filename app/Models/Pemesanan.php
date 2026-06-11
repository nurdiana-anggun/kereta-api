<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans'; 
    protected $primaryKey = 'pemesanan_id'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id', 
        'jadwal_id', 
        'tanggal_pemesanan', 
        'jumlah_tiket', 
        'total_harga', 
        'status_pemesanan'
    ];
    
    // --- RELASI ---

    // Tambahkan ini agar 'with(["user"])' di Controller bekerja
    public function user() 
    { 
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function jadwal() 
    { 
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'jadwal_id'); 
    }
}