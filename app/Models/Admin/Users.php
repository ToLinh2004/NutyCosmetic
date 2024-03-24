<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    public function addUser($data){
        DB::insert('INSERT INTO users(user_name, email, phone, password, address, image) VALUES (? ,? ,?, ?, ?, ?)', $data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '. $this->table.' WHERE id = ?', [$id]);
    }
    public function updateUser($data,$id){
        $data[] =$id ;
        return DB::update('UPDATE ' . $this->table . ' SET user_name=?, email=?, phone=?, password=?, address=?, status=?, image=? WHERE id=?', $data);
    }
    public function deleteUser($id){
        return DB::update('UPDATE '.$this->table.' SET status = \'Inactive\' WHERE id = ?', [$id]);
    }
}