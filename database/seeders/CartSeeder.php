<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartModel;


class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            \App\Models\CartModel::create([
                'product_id' => fake()->numberBetween(1, 200),
                'product_name' => fake()->sentence(5),
                'custom_users' => rand(1, 200),
                'product_image' => $i %2==0? '/products/computer.png':'/products/cup.png',
                'price' => fake()->randomFloat(2,10,500),
                'qty' => fake()->numberBetween(1, 10),
                'total_price' => fake()->randomFloat(2,10,500),

            ]);
        }

    }
}
