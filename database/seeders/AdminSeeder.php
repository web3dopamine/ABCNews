<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Admin Name',
            'username' => 'admin@gmail.com',
            'password' => '$2a$12$z9dmHfRByoeRuC7.BDVAEOV318sdLfXK6DYNnJfZtwmgV2Y0fJLOK',
            'user_type' => 1,
        ]);
    }
}
