<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function getAllCategories(){
        $categories =DB::table('categories')
        ->select('id', 'category_name as category')
        ->get();
        return($categories);
    }

    public function add($data){
        DB::insert('INSERT INTO categories(category_name) VALUES (?)', $data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '. $this->table.' WHERE id = ?', [$id]);
    }
    public function updateCategory($data,$id){
        $data[] =$id ;
        return DB::update('UPDATE ' . $this->table . ' SET category_name = ? WHERE id = ?', $data);
    }
    public function deleteCategory($id){
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
    public function getCategoryDetail($id)
    {
        $typeCategory=Categories::find($id); // tìm khóa chính
        return $typeCategory;
    }   
}
