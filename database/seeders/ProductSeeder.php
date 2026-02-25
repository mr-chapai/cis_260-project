<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            \App\Models\Product::create([
                'product_name' => fake()->word(),
                'product_description' => fake()->sentence(10),
                'product_qty' => rand(1, 100),
                'product_image' => null,
                'product_price' => fake()->randomFloat(2, 10, 1000),
                'product_category' => fake()->randomElement(['Electronics', 'Clothes', 'Food']),
            ]);
        }
    }
}
