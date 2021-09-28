<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'amirhosein',
            'email' => 'amirhosein@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'mlika',
            'email' => 'mlika@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
