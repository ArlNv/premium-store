<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_id',
        'name',
        'email',
        'password',
        'role', // tambahkan kolom role langsung
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi ke model Position
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Relasi ke model Pembelian
     */
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    /**
     * Cek role dari kolom 'role'
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPembeli()
    {
        return $this->role === 'pembeli';
    }

    /**
     * Cek role berdasarkan posisi (dari relasi Position)
     */
    public function isAdminByPosition()
    {
        return $this->position && strtolower($this->position->name) === 'admin';
    }

    public function isPembeliByPosition()
    {
        return $this->position && strtolower($this->position->name) === 'pembeli';
    }
}
