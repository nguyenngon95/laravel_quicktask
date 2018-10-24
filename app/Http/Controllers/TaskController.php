<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(TaskRequest $request)
    {
        $result = $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        if ($result) {
            $request->session()->flash('suc', trans('messages.success'));
        } else {
            $request->session()->flash('err', trans('messages.fail'));
        }

        return redirect('/tasks');
    }

    public function edit(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('destroy', $task);

        try {
            $task->name = $request->name;
            $task->save();
            $request->session()->flash('suc', trans('messages.edit_suc'));
        } catch (Exception $e) {
            $request->session()->flash('err', $e->getMessage());
        }

        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $result = $task->delete();

        if ($result) {
            $request->session()->flash('suc', trans('messages.delete_suc'));
        } else {
            $request->session()->flash('err', trans('messages.delete_fail'));
        }

        return redirect('/tasks');
    }
}
