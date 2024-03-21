<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser(){
        $users =DB::select('SELECT * FROM users');
        return($users);
    }
}
