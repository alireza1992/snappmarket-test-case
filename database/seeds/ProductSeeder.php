<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=\App\Models\Category::first();
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => rand(20000,400000),
            'description' => Str::random(100),
            'stock'=>rand(0,100),
            'category_id'=> $category->id,
            'created_at'=>\Illuminate\Support\Facades\Date::today()


        ]);
    }
}
