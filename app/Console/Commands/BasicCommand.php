<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BasicCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basic:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Basic Command';

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
        $this->info('Running the Basic Command');
        $this->warn('This is a warning');
        $this->error('This is an error');
    }
}
