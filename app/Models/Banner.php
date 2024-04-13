<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    public function getAllBanner()
    {
        return Banner::where('status', '!=', 'inactive')->get();
    }
    public function addBanner($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function updateBanner($data,$id){
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteBanner($id){
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => 'Inactive']);
    }
    public function getBannerDetail($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->get();
    }
}
