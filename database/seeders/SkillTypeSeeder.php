<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillType;

class SkillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkillType::create([
            'title' => 'Frontend Developer',
            'verified'=>true
        ]);
        /* Type
         *   ADMIN,USER,COMPANY
         * */
    }
}
