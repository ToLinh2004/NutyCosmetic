<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function getAllProduct($perPage = 0){
        $products =DB::table('products')
        ->select('products.*', 'categories.category_name as category')
        ->join('categories', 'categories.id', '=' ,'products.category_id' )
        ->where('products.status','Active');
        if (!empty($perPage)){
            $products = $products->paginate($perPage);
        }else{
            $products = $products->get(); 
        }
        return($products);
    }
    public function addProduct($data){
        return DB::table($this->table) ->insert($data);
    }
    public function updateProduct($data,$id){
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteProduct($id){
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => 'Inactive']);
    }
    public function getProductDetail($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->get();
    }
}
