<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model {
    use HasFactory;

    public function order_user() {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function order() {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
