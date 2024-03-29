<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'he who remain',
            'username' => '1 sks 5 juta',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $superAdmin->assignRole('admin');

        $superAdmin = User::create([
            'name' => 'ky',
            'username' => 'ukt nabi adam',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $superAdmin->assignRole('user');
    }
}
