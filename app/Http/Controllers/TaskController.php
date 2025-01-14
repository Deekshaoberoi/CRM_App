<?php

namespace App\Http\Controllers;

use App\Data\TaskData;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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

    public function search(Request $request)
    {
        return TaskData::collect(QueryBuilder::for(Task::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}
