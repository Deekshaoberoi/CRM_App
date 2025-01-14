<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Data\ActivityLogData;

class ActivityLogRepository
{
    public function getActivityLogById(int $id, $relations = []): ActivityLog
    {
        return ActivityLog::with($relations)->findOrFail($id);
    }

    public function storeActivityLog(ActivityLogData $activityLogData): ActivityLog
    {
        $activityLog = new ActivityLog;
        $activityLog->fill($activityLogData->except('id')->toArray());
        $activityLog->save();

        return $activityLog;
    }

    public function updateActivityLog(ActivityLogData $activityLogData, ActivityLog $activityLog)
    {
        $activityLog->fill($activityLogData->except('id')->toArray());
        $activityLog->update();

        return $activityLog;
    }

    public function deleteActivityLog(ActivityLog $activityLog): bool
    {
        return $activityLog->delete();
    }
}
