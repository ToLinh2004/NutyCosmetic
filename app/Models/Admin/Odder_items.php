<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odder_items extends Model {
    use HasFactory;

    public function order_user() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
