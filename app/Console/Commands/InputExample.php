<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InputExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'input:example 
                                {first : First Argument}
                                {second : Second Argument}';

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
        $first = $this->argument('first');
        $second = $this->argument('second');

        $this->info('First Argument: ' . $first);
        $this->info('Second Argument: ' . $second);

        $args = $this->arguments();

        $this->info('First Argument: ' . $args['first']);
        $this->info('Second Argument: ' . $args['second']);
    }
}
