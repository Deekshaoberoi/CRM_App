<?php

namespace App\Http\Controllers;

use App\Data\ActivityLogData;
use App\Repositories\ActivityLogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ActivityLogController extends Controller
{
    public function __construct(private ActivityLogRepository $activityLogRepository) {}

    public function index()
    {
        return view('Activity-Logs.index');
    }

    public function create()
    {
        return view('Activity-Logs.create');
    }

    public function store(ActivityLogData $request)
    {
        $this->activityLogRepository->storeActivityLog($request->validated());

        return Redirect::route('Activity-Logs.index');
    }

    public function update(ActivityLogData $request, int $id)
    {
        $this->activityLogRepository->updateActivityLog($request->validated(),
            $this->activityLogRepository->getActivityLogById($id));

        return Redirect::route('Activity-Logs.index');
    }

    public function search(Request $request)
    {
        return ActivityLogData::collect(QueryBuilder::for(ActivityLog::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}
