<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    protected $fillable = [
        'user_id', 'product_id', 'kontak', 'metode_pembayaran', 'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(InternetPackage::class, 'product_id', 'id');
    }

    public function paket()
    {
    return $this->belongsTo(InternetPackage::class, 'internet_package_id');
    
    }
}
