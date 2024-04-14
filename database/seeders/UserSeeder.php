<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $now = Carbon::now();
        DB::table('users')->insert(
            [
                'user_name' => 'Vân 123',
                'password' => Hash::make('123456789'),
                'phone' => '0841234432',
                'email' => 'van@gmail.com',
                'role' =>   'user',
                'address' => 'address',
                'image_url' => 'https://res.cloudinary.com/di9iwkkrc/image/upload/v1701007211/Prety_Girls/hem0cervrfeoqfeoilvb.jpg'
            ]
        );
    }
}
