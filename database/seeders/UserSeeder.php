<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\UserModel::create([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName(10),
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('admin'),
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Others']),
            'role' => 'admin',
            'status' => fake()->randomElement(['active', 'expired', 'panding']),
        ]);
        \App\Models\UserModel::create([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName(10),
            'email' => 'user@gmail.com',
            'password' =>Hash::make('user'),
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Others']),
            'role' => 'user',
            'status' => fake()->randomElement(['active', 'expired', 'panding']),
        ]);
        \App\Models\UserModel::create([
            'first_name' => 'Guest',
            'last_name' => 'User',
            'email' => 'guest@gmail.com',
            'password' =>Hash::make('guest'),
            'phone' => '0000000000',
            'gender' => 'Others',
            'role' => 'user',
            'status' => 'active'
        ]);

        /*
         * for ($i = 0; $i < 200; $i++) {
            \App\Models\UserModel::create([
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
