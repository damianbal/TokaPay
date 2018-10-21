<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('demo123'),
            'business' => false,
            'balance' => 1000.0
         ]);

        $user = User::create([
            'name' => 'Some company',
            'email' => 'sc@sc.com',
            'password' => 'ddfgdfgdsfgdsfgsdfgdfg',
            'business' => true,
            'balance' => 0.0,
        ]);
    }
}
