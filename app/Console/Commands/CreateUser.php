<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create';

    protected $description = 'Create a new user';

    public function handle()
    {
        $name = $this->ask('Enter the name:');
        $email = $this->ask('Enter the email:');
        $password = $this->secret('Enter the password:');

        $userData = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ];

        $user = User::create($userData);

        $this->info('User created successfully.');
    }
}
