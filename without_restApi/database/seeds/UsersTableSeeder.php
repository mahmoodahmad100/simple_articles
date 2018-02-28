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

        // fake data provider
        $faker = \Faker\Factory::create();

        // hashing the password
        $admin_password = Hash::make('admin');
        $user_password  = Hash::make('user');

        // creating the admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $admin_password
        ]);

        // creating the users
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $user_password
            ]);
        }

    }
}
