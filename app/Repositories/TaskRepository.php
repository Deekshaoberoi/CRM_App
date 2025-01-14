<?php

namespace App\Repositories;

use App\Data\TaskData;
use App\Models\Task;

class TaskRepository
{
    public function getTaskById(int $id, $relations = []): Task
    {
        return Task::with($relations)->findOrFail($id);
    }

    public function storeTask(TaskData $taskData): Task
    {
        $task = new Task;
        $task->fill($taskData->except('id')->toArray());
        $task->save();

        return $task;
    }

    public function updateTask(TaskData $taskData, Task $task)
    {
        $task->fill($taskData->except('id')->toArray());
        $task->update();

        return $task;
    }

    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}
