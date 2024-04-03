<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderStatus extends Model
{
    use HasFactory;
    protected $table = 'order_status';
    public function getAll(){
        return DB::table($this->table)->get();
    }
}
