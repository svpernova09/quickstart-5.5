<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class AuthLoginCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Login a user';

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
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $this->info('Hello ' . $user->name . ', you have been logged in');
            exit();
        }

        $this->error('Invalid email or password');
    }
}
