<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function getAllOrder()
    {
        $orders = DB::select('SELECT orders.id, users.user_name, users.phone, orders.total_price, orders.date, order_status.status_name, products.product_name
        FROM orders
        INNER JOIN users ON orders.user_id = users.id
        INNER JOIN order_status ON orders.order_status_id = order_status.id
        INNER JOIN odder_items ON orders.id = odder_items.order_id
        INNER JOIN products ON products.id = odder_items.product_id
        ');
        return ($orders);
    }
}
