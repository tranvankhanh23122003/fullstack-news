<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('categories')->insert([
[
"name"=>"khanh",
"slug"=>"categories",
"created_at"=>"2025-11-12",
"updated_at" => "2025-11-12"

]

        ]);
    }
}
