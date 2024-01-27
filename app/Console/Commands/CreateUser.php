<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Enter Name:');
        $email = $this->ask('Enter Email:');
        $password = $this->secret('Enter Password:');

        $proceed = $this->confirm('Proceed to create user? (yes/no)', true);

        if ($proceed) {
            $user = new User([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'status_id' => 4,
            ]);
            $user->save();

            $this->info('User created successfully!');
        } else {
            $this->info('User creation canceled.');
        }
    }
}
