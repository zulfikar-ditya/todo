<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@mail.com',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'email' => 'admin1@mail.com',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
    }
}
