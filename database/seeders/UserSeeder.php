<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'api_token' => Str::random(60),
            'type'=> 'ADMIN'
        ]);
        /* Type
         *   ADMIN,USER,COMPANY
         * */
    }
}
