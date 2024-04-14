<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='contact';
    public function getAllContact(){
        $contacts = DB::table($this->table)->get();
        return $contacts;
    }
}
