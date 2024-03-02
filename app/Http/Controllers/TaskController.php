<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::oldest()->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks'], 404);
        }

        return response()->json($tasks, 200);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json($task);
    }

    public function update(UpdateRequest $request, Task $task): JsonResponse
    {
        $data = $request->only(['title', 'description', 'status', 'due_date']);

        if (!isset($data['status'])) {
            unset($data['status']);
        }

        if (!isset($data['due_date'])) {
            unset($data['due_date']);
        }

        $task->update($data);

        return response()->json($task);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
