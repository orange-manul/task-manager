<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use App\Service\Task\Service;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $tasks = $this->service->getAllTasks();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks'], 404);
        }

        return response()->json($tasks, 200);
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

        $this->service->updateTask($task, $data);

        return response()->json($task);
    }

    public function destroy(Task $task): JsonResponse
    {
        $this->service->deleteTask($task);

        return response()->json(null, 204);
    }
}
