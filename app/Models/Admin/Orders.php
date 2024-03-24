<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function getAllOrder()
    {
        $orders = DB::table('orders')
        ->select('orders.id as ID', 'users.user_name as username', 'users.phone as phone', 'orders.date as date',  'orders.total_price as totalprice', 'products.product_name as productname', 'order_status.status_name as status')
        ->join('users', 'orders.user_id', '=', 'users.id') 
        ->join('order_status', 'orders.order_status_id', '=', 'order_status.id')
        ->join('odder_items', 'orders.id' , '=', 'odder_items.order_id')
        ->join('products', 'products.id', '=', 'odder_items.product_id')
        ->get();
        return ($orders);
    }
}
