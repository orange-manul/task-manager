<?php

namespace App\Service\Task;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Service
{

    public function filterTasks($status = null)
    {
        $query = Task::query();

        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        if (!isset($data['status'])) {
            unset($data['status']);
        }

        if (!isset($data['due_date'])) {
            unset($data['due_date']);
        }

        $task->update($data);

        return $task;
    }

    public function deleteTask(Task $task): void
    {
        DB::transaction(function () use ($task){
            $task->delete();
        });
    }
}
