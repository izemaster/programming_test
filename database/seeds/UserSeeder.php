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
            'name' => 'Client',
            'email' => 'client@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),

        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'is_admin' =>true,
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),

        ]);
    }
}
