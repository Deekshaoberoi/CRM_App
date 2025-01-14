<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\TaskData;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository) {}

    public function index()
    {
        return view('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskData $request)
    {
        $this->taskRepository->storeTask($request->validated());

        return Redirect::route('tasks.index');
    }

    public function update(TaskData $request, int $id)
    {
        $this->taskRepository->updateTask($request->validated(), $this->taskRepository->getTaskById($id));

        return Redirect::route('tasks.index');
    }
}