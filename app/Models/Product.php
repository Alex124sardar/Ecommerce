<?php

namespace App\Models;

use App\Http\Controllers\CartController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

}