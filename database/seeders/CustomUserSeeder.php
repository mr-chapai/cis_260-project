<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\CustomUser::create([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName(10),
            'email' => 'admin@gmail.com',
            'password' =>' "admin"',
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Femal', 'Others']),
            'role' => 'admin',
            'address' => fake()->streetAddress,
            'address2' => rand(1, 100),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'zip' => fake()->postcode(),
            'status' => fake()->randomElement(['active', 'expired', 'panding']),
        ]);
        \App\Models\CustomUser::create([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName(10),
            'email' => 'user@gmail.com',
            'password' => 'user',
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Femal', 'Others']),
            'role' => 'user',
            'address' => fake()->streetAddress,
            'address2' => rand(1, 100),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'zip' => fake()->postcode(),
            'status' => fake()->randomElement(['active', 'expired', 'panding']),
        ]);






        /*
         * for ($i = 0; $i < 200; $i++) {
            \App\Models\CustomUser::create([
                'first_name' => fake()->firstName,
                'last_name' => fake()->lastName(10),
                'email' => fake()->email,
                'password' => fake()->password,
                'phone' => fake()->phoneNumber(),
                'gender' => fake()->randomElement(['Male', 'Femal', 'Others']),
                'role' => fake()->randomElement(['user', 'admin']),
                'address' => fake()->streetAddress,
                'address2' => rand(1, 100),
                'city' => fake()->city(),
                'country' => fake()->country(),
                'state' => fake()->state(),
                'zip' => fake()->postcode(),
                'status' => fake()->randomElement(['active', 'expired', 'panding']),
            ]);
        }*/
    }
}
