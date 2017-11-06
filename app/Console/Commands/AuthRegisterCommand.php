<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AuthRegisterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');

        do {
            $password = $this->secret('Enter a password');
            $password_confirm = $this->secret('Confirm your password');
        } while ($password !== $password_confirm);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->info('User ' . $user->name . ' has been created');
    }
}
