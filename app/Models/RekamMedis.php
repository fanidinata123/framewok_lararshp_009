<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false; // created_at dihandle manual

    protected $fillable = [
        'created_at',
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'idpet',
        'dokter_pemeriksa',
        'idreservasi_dokter',
    ];

    /**
     * Agar created_at dibaca sebagai Carbon date (fix error format())
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relasi ke Pet
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    /**
     * Relasi ke User (dokter)
     */
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_pemeriksa', 'iduser');
    }

    /**
     * Relasi ke Temu Dokter
     */
    public function temu()
    {
        return $this->belongsTo(TemuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    /**
     * Relasi Detail Rekam Medis
     */
    public function details()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }
}
