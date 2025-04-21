<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',   
        'description', 
        'price', 
    ];

    // Relasi satu produk dapat memiliki banyak lead
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}