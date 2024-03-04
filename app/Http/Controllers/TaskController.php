<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->input('status');
        $tasks = $this->service->filterTasks($status);

        return response()->json($tasks);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $task = $this->service->createTask($data);

        return response()->json($task, 201);
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json($task);
    }

    public function update(UpdateRequest $request, Task $task): JsonResponse
    {
        $data = $request->only(['title', 'description', 'status', 'due_date']);;
        $updateTask = $this->service->updateTask($task, $data);

        return response()->json($updateTask);
    }

    public function destroy(Task $task): JsonResponse
    {
        $this->service->deleteTask($task);

        return response()->json(null, 204);
    }

}
