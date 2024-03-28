<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getAllProducts()
    {
        $productAll=Products::all();
        return  $productAll;
    }
    public function getProductPopular()
    {
        $productsPopular = DB::select('SELECT * FROM products ORDER BY quantity ASC limit 8');
        return $productsPopular;
    }
    public function getProductDetail($id)
    { 
        $productDetail = Products::find($id);
        return $productDetail;
    }
    public function getCategory($typeCategory) {
        $products = Products::where('category_id',$typeCategory->id)->get();
        return $products;
        
    }
    public function getProductCategory($typeCategory) {
        $products = Products::where('category_id',$typeCategory)->get();
        return $products;
    }

    public function getAddToCart($id){
        $product = Products::find($id);
        return $product;
    }
}
