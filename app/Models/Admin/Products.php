<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function getAllProduct(){
        $products =DB::table('products')
        ->select('products.*', 'categories.category_name as category')
        ->join('categories', 'categories.id', '=' ,'products.category_id' )
        ->get();
        return($products);
    }
}
