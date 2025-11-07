<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    // Jika tabelnya bukan 'positions', kamu bisa tentukan secara eksplisit
    // protected $table = 'positions';

    // Tentukan kolom yang bisa diisi secara massal (opsional tapi direkomendasikan)
    protected $fillable = ['name'];

    // Relasi ke User (satu posisi bisa dimiliki banyak user)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
