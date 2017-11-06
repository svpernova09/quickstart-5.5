<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Task;
use App\User;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();

        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    public function add()
    {
        $users = User::all();

        return view('tasks.add')
            ->with('users', $users);
    }

    public function create(TaskCreateRequest $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->save();


        return redirect()->route('tasks.index');
    }
}
