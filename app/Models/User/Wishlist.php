<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {
    use HasFactory;
    public function Products() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
