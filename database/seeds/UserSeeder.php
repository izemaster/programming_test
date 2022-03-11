<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Dennis',
            'email' => 'dennis.cesti@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),

        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@cesti.pe',
            'is_admin' =>true,
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),

        ]);
    }
}
