<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembuatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class, 'pembuatan_id');
    }
    
}
