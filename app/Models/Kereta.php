<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    // Nama tabel di database
    protected $table = 'keretas';

    // Memberitahu Laravel bahwa Primary Key-nya adalah 'kereta_id'
    protected $primaryKey = 'kereta_id';

    // Jika kereta_id bukan auto-increment (tapi biasanya true), biarkan saja
    public $incrementing = true;

    // Tentukan tipe data primary key jika bukan integer (biasanya integer)
    protected $keyType = 'int';

    protected $fillable = [
        'nama_kereta', 
        'kelas', 
        'jenis_kereta', 
        'kapasitas', 
        'deskripsi'
    ];
}