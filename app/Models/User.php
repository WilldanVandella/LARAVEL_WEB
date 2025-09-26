<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nim',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'foto_profil',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date',
    ];

    // Accessor untuk foto profil - PASTIKAN INI BENAR
    public function getFotoProfilUrlAttribute()
    {
        if ($this->foto_profil) {
            // Pastikan path storage benar
            return asset('storage/foto-profil/' . $this->foto_profil);
        }
        // Fallback ke default avatar
        return asset('images/default-avatar.png');
    }

    // Hitung umur
    public function getUmurAttribute()
    {
        return $this->tanggal_lahir ? now()->diffInYears($this->tanggal_lahir) : 0;
    }
}