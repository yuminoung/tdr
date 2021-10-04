<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return ['name' => 'Oung', 'username' => 'oung', 'password' => bcrypt('oungyumin'), 'remember_token' => null];
    }
}
