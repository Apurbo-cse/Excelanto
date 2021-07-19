<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('job_categories')->insert([
                'category_name' => Str::random(10),
                'status' => 'active',
            ]);
        }

        DB::table('job_categories')->insert([
            'category_name' => "Web Developer",
            'status' => 'active',
        ]);

        DB::table('job_categories')->insert([
            'category_name' => "Doctor",
            'status' => 'active',
        ]);
    }
}
