<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function getAllTasks()
    {
        return response()->json(Task::all());
    }

    public function getOneTask($id)
    {
        return response()->json(Task::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'description' => 'max:255',
            'status' => 'required|alpha_dash|max:12',
            'progress' => '',
            'size' => '',
            'category' => '',
            'privacy' => '',
            'urgency' => 'required|alpha_dash|max:16',
            'time_remaining' => 'integer'
        ]);

        $tasks = Task::create($request->all());

        return response()->json($tasks, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'description' => 'max:255',
            'status' => 'required|alpha_dash|max:12',
            'progress' => '',
            'size' => '',
            'category' => '',
            'privacy' => '',
            'urgency' => 'required|alpha_dash|max:16',
            'time_remaining' => 'integer'
        ]);

        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());

        return response()->json($tasks, 200);
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        return response('Successfully Deleted Task', 200);
    }


}