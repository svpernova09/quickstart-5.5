<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskAPITest extends TestCase
{
    public function testAPITaskRoute()
    {
        $this->get('/api/tasks');

        $this->assertResponseOk();
    }

    public function testAPITaskRouteHasStructure()
    {
        $this->get('/api/tasks')
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at',
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testAPITaskGetRoute()
    {
        $task = factory(App\Task::class)->create();

        $this->get('/api/tasks/' . $task->id)
            ->seeJsonStructure([
                'id',
                'name',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
                'created_at',
                'updated_at',
            ]);
    }
}
