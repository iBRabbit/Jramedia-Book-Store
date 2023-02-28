<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

     
    protected $guarded = [
        'id'
    ];

    public function cart() {
        return $this -> hasMany(Cart::class);
    }

    public function transaction() {
        return $this -> hasMany(Transaction::class);
    }
}
