<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function getCategoryDetail($id)
    {
        $typeCategory = Categories::where('id', $id)
                                 ->where('status', '!=', 'inactive')
                                ->first();   // tìm khóa chính
        return $typeCategory;
    }
}