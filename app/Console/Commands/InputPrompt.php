<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InputPrompt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'input:prompt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if ($this->confirm('Do you wish to continue? [y|N]')) {
            $name = $this->ask('What is your name?');

            $this->info('Name entered: ' . $name);

            $password = $this->secret('Enter your password');

            $this->info('Password entered: ' . $password);
        }
    }
}
