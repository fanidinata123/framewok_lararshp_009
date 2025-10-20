<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; // sesuai tabel di database
    protected $primaryKey = 'iduser';
    public $timestamps = false; // karena tidak ada created_at & updated_at

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function pemilik()
    {
        // 1 user punya 1 pemilik
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }
}
