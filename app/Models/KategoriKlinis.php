<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKlinis extends Model
{
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    public $timestamps = false;
    public $incrementing = false; // ID tidak auto increment
    protected $keyType = 'int';
    
    protected $fillable = [
        'idkategori_klinis',      // Tambahkan ini agar bisa diisi manual
        'nama_kategori_klinis'
    ];
}