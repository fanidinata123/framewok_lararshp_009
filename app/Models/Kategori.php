<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;
    public $incrementing = false; // ID tidak auto increment
    protected $keyType = 'int';
    
    protected $fillable = [
        'idkategori',      // Tambahkan ini agar bisa diisi manual
        'nama_kategori'
    ];
}