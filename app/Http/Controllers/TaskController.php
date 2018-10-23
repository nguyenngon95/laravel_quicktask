<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('tasks.index');
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
