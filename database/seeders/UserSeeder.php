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
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('useruser'),
            'api_token' => Str::random(60),
            'type'=> 'USER'
        ]);
        User::create([
            'name' => 'Company',
            'email' => 'company@company.com',
            'password' => bcrypt('companycompany'),
            'api_token' => Str::random(60),
            'type'=> 'COMPANY'
        ]);
        /* Type
         *   ADMIN,USER,COMPANY
         * */
    }
}
