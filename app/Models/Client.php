<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['internet_package_id', 'name', 'phone_number', 'house_image', 'address'];

    public function internet_package()
    {
        return $this->belongsTo(InternetPackage::class, 'internet_package_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

}
