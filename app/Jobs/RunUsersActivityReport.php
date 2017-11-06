<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use League\Csv\CannotInsertRecord;
use League\Csv\Writer;

class RunUsersActivityReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * @throws CannotInsertRecord
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        $users->sortBy('name');

        // cleanup old report
        if (is_file(storage_path() . '/users.csv')) {
            unlink(storage_path() . '/users.csv');
        }

        $csv = Writer::createFromPath(storage_path() . '/users.csv', 'w');
        $csv->insertOne([
            'name',
            'email',
            'created_at',
        ]);

        foreach ($users as $user) {
            $csv->insertOne([
                $user->name,
                $user->email,
                $user->created_at,
            ]);
        }
    }

    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
    }

    public function boot()
    {
        Queue::failing(function (JobFailed $event) {
            // $event->connectionName
            // $event->job
            // $event->exception
        });
    }
}
