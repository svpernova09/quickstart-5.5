<?php
use App\Http\Controllers\TaskController;
use App\Task;
use Illuminate\Database\Eloquent\Collection;

describe('TaskController', function() {
    describe('index', function() {
        it('returns the index view', function() {
            $task = new Task([
                'name' => 'new Task',
                'user_id' => 1,
            ]);

            $collection = new Collection($task);

            $instance = new TaskController();
            allow($instance)
                ->toReceive('index')
                ->andReturn($collection);

            expect($instance->index())
                ->toContainKeys('name', 'user_id');
        });
    });
});