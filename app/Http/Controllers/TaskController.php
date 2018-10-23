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
}
