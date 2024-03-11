<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $roles = ['seller', 'customer'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }

        $users = [
            [
                'name' => 'john',
                'email' => 'john@gmail.com',
                'role_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'jessica',
                'email' => 'jessica@gmail.com',
                'role_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10)
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }

        \App\Models\Product::factory(10)->create();
    }
}
