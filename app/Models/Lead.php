<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'name',     
        'contact',   
        'product_id',   
    ];

    public function product()
    {
    return $this->belongsTo(Product::class);
    }

}
