<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Contact extends Model
{
    use HasFactory;
    protected $table='contact';
    public function postContact($data){
        DB::table($this->table)->insert($data);
    }
}
