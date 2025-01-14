<?php

namespace App\Http\Controllers;

use App\Data\ActivityLogData;
use App\Repositories\ActivityLogRepository;
use Illuminate\Support\Facades\Redirect;

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
}
