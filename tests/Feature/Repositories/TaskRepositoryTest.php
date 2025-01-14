<?php

namespace Tests\Feature\Repositories;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Tests\TestCase;

class TaskRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private TaskRepository $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->task = app(TaskRepository::class);
    }

    public function test_get_Task_by_id(): void
    {
        $task = Task::factory()->create();

        $this->assertEquals(Task::class, get_class($this->task->getTaskById($task->id)));
    }

    public function test_store_task(): void
    {
        $task = Task::factory()->make();

        $this->task->storeTask($task->getData());

        $this->assertDatabaseHas((new Task)->getTable(), [
            'name' => $task->name,
            'description' => $task->description,
            'due_date' => $task->due_date,
            'status' => $task->status,
            'assigned_to' => $task->assigned_to,
            'related_to' => $task->related_to,
            'related_id' => $task->related_id,
        ]);
    }

    public function test_update_task(): void
    {
        $task = Task::factory()->create();

        $task->description = 'This is a test task';

        $this->task->updateTask($task->getData(), $task);

        $this->assertDatabaseHas((new Task)->getTable(), [
            'id' => $task->id,
            'description' => $task->description,
        ]);
    }

    public function test_delete_Task(): void
    {
        $task = Task::factory()->create();
    }
}