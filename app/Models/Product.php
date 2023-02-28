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

    public function scopeFilter($query) {
        // dd(empty(request('search')));
        if(request('search')) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    public function cart() {
        return $this -> hasMany(Cart::class);
    }

    public function transaction() {
        return $this -> hasMany(Transaction::class);
    }
}
