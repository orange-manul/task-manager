<?php

namespace App\Service\Task;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class Service
{
    public function getAllTasks()
    {
        return Task::oldest()->get();
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function updateTask(Task $task, array $data): void
    {
        if (!isset($data['status'])) {
            unset($data['status']);
        }

        if (!isset($data['due_date'])) {
            unset($data['due_date']);
        }

        $task->update($data);
    }

    public function deleteTask(Task $task): void
    {
        DB::transaction(function () use ($task){
            $task->delete();
        });
    }
}
