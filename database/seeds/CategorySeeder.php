<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => Str::random(10),
            'parent_id' => null,
            'description' => Str::random(100),
            'created_at'=>\Illuminate\Support\Facades\Date::today()
        ]);
    }
}
