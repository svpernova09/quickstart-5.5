<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use DatabaseTransactions;

    public function testTasksRoute()
    {
        $this->visit('/tasks')
            ->see('Tasks Index');

        $this->assertResponseOk();
    }

    public function testTasksNavigation()
    {
        $this->visit('/')
            ->click('Tasks')
            ->seePageIs('/tasks');
    }

    public function testTasksViewHasData()
    {
        $this->visit('/tasks')
            ->seePageIs('/tasks');

        $this->assertViewHas('tasks');
    }

    public function testDataExists()
    {
        $task = factory(App\Task::class)->create();

        $this->visit('/tasks')
            ->see($task->name);
    }
}
