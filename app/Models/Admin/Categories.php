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
}
