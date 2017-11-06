<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskCreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRouteWorks()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/tasks/add')
            ->see('Add Task');

        $this->assertResponseOk();
    }

    public function testFormSubmitWorks()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/tasks/add')
            ->type('Test Task', 'name')
            ->select($user->id, 'user_id')
            ->press('Add Task')
            ->seePageIs('/tasks')
            ->seeInDatabase('tasks', [
                'name' => 'Test Task',
                'user_id' => $user->id,
            ]);
    }

    public function testFormValidation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/tasks/add')
            ->press('Add Task')
            ->seePageIs('/tasks/add');
    }

    public function testErrorMessages()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/tasks/add')
            ->select($user->id, 'user_id')
            ->press('Add Task')
            ->see('You must enter a Task Name')
            ->seePageIs('/tasks/add');
    }

    public function testOldInput()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/tasks/add')
            ->select($user->id, 'user_id')
            ->press('Add Task')
            ->see('You must enter a Task Name')
            ->seeIsSelected('user_id', $user->id)
            ->seePageIs('/tasks/add');
    }
}
