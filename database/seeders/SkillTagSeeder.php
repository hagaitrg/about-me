<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_tags')->insert([
            'id' => 1,
            'name' => 'Web Development',
        ]);

        DB::table('skill_tags')->insert([
            'id' => 2,
            'name' => 'Framework',
        ]);

        DB::table('skill_tags')->insert([
            'id' => 3,
            'name' => 'Database',
        ]);

        DB::table('skill_tags')->insert([
            'id' => 4,
            'name' => 'Version Control System',
        ]);
    }
}
