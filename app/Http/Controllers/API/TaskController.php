<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    public function index(): JsonResource
    {
        return TaskResource::collection(Task::orderByDesc('id')->get());
    }

    public function store(Request $request): JsonResource
    {
        $task = Task::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'user_id' => 'required|int'
        ])
        );

        return new TaskResource($task);
    }

    public function show(Task $task): JsonResource
    {
        return new TaskResource($task);
    }

    public function update(Request $request, Task $task): JsonResource
    {
        $task->update($request->validate([
        'title' => 'string|max:255',
        'description' => 'string|max:255',
        'status' => 'string|max:255',
        'user_id' => 'int'
        ]));

        return new TaskResource($task);
    }

    public function destroy(Request $request,Task $task): JsonResource
    {
        $task->find($request->id);
        $task->delete();

        return TaskResource::collection(Task::orderByDesc('id')->get());
    }
}
