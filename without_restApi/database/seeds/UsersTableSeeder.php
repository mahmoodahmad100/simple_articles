<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clearing the users table
        User::truncate();

        // hashing the password
        $password = Hash::make('admin');

        // creating the admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $password
        ]);
    }
}
