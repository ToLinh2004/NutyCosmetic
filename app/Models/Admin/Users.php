<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser(){
        $users =DB::table('users')
        ->select('users.*')
        ->get();
        return($users);
    }
}
