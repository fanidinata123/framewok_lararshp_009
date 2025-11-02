<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'temu_dokter'; // tabel aslinya
    protected $primaryKey = 'idreservasi_dokter';
    public $timestamps = false;

    protected $fillable = [
        'no_urut',
        'waktu_daftar',
        'status',
        'idpet',
        'idrole_user',
    ];

    // Relasi ke tabel Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    // Relasi ke tabel User (dokter)
    public function dokter()
    {
        return $this->belongsTo(User::class, 'idrole_user', 'iduser');
    }
}
