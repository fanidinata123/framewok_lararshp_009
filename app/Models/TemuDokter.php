<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter'; // atau nama tabel kamu; jika table bernama lain, sesuaikan
    protected $primaryKey = 'idreservasi_dokter';
    public $timestamps = false; // kamu punya waktu_daftar timestamp; model tidak pakai created_at updated_at
    protected $fillable = [
        'no_urut',
        'waktu_daftar',
        'status',
        'idpet',
        'idrole_user', // dokter (role_user id)
    ];

    // Relasi ke Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    // Relasi ke RoleUser (dokter user)
    public function roleUser()
    {
        return $this->belongsTo(RoleUser::class, 'idrole_user', 'idrole_user');
    }

    // Jika kamu punya model User dan role_user table linking, sesuaikan relasi
}
