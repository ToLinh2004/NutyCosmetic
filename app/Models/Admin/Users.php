<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpKernel\Attribute\ValueResolver;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser($perPage = 0)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('status', 'Active');
        if (!empty($perPage)) {
            $users = $users->paginate($perPage);
        } else {
            $users = $users->get();
        }
        return ($users);
    }

    public function addUser($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function getDetail($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->get();
    }
    public function updateUser($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteUser($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => 'Inactive']);
    }
}
