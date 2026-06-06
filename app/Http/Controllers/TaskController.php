<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10|min:3'
        ]);

        $task_name = $request->name;

        $task = new Task;
        $task->name = $task_name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::where('id', $id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        $tasks = Task::all();

        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:10|min:3'
        ]);

        $id = $request->id;

        Task::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect('tasks');
    }
}
