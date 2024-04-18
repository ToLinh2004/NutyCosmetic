<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model {
    use HasFactory;
    
    protected $table = 'orders';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function orderItems() {
        return $this->hasMany(Order_items::class, 'order_id');
    }

    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function getAllOrder() {
        $orders = DB::table('orders')
            ->select('orders.id as id', 'users.id as user_id', 'users.user_name as username', 'users.phone as phone', 'orders.date as date',  'orders.total_price as totalprice', 'products.product_name as productname', 'order_status.status_name as status', 'order_status.id as status_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->get();
        return ($orders);
    }

    public function updateStatus($id, $value) {
        $order = Orders::find($id);
        $order->order_status_id = $value;
        $order->save();
    }
}