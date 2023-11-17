<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            'category_name' => 'Sport',
        ]);

        DB::table('product_categories')->insert([
            'category_name' => 'Daily',
        ]);

        DB::table('product_categories')->insert([
            'category_name' => 'Accesoeries',
        ]);
    }
}
