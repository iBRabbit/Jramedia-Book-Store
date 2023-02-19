<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this -> faker -> name(),
            'email' => $this -> faker -> unique() -> safeEmail(),
            'password' => $this -> faker -> password() 
        ];
    }

}
