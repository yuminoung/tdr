<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create(['name' => 'Oung', 'username' => 'oung', 'password' => bcrypt('oungyumin'), 'remember_token' => null]);
        User::create(['name' => 'Cathy', 'username' => 'cathy', 'password' => bcrypt('oungyumin'), 'remember_token' => null]);
    }
}
