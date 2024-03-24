<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function getAllProducts()
    {
        $products = DB::select('SELECT * FROM products');
        return  $products;
    }
    public function getProductPopular()
    {
        $productsPopular = DB::select('SELECT * FROM products ORDER BY quantity ASC limit 8');
        return $productsPopular;
    }
    public function getProductDetail($id)
    {
        return DB::select('SELECT *FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
