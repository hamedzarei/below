<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::createItem([
            'username' => 'admin',
            'email' => 'info@below.ir',
            'password' => bcrypt('admin'),
            'role' => User::ROLE_ADMIN
        ]);
    }
}
