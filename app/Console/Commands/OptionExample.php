<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptionExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:example
                                {--test= : Test Mode}';

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
        $options = $this->options();

        $this->info('Test Option: ' . $options['test']);

        if (is_null($options['test'])) {
            $this->info('Test Option is null');
        }
    }
}
