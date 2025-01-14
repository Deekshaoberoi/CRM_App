<?php

namespace Tests\Feature\Repositories;

use App\Models\ActivityLogs;
use App\Repositories\ActivityLogRepository;
use Tests\TestCase;

class ActivityLogRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private ActivityLogRepository $activityLog;

    protected function setUp(): void
    {
        parent::setUp();

        $this->activityLog = app(ActivityLogRepository::class);
    }

    public function test_get_activity_log_by_id(): void
    {
        $activityLog = ActivityLogs::factory()->create();

        $this->assertInstanceOf(ActivityLogs::class, $this->activityLog->getActivityLogById($activityLog->id));
    }

    public function test_store_activity_log(): void
    {
        $activityLogData = ActivityLogs::factory()->make()->toArray();

        $this->activityLog->storeActivityLog($activityLogData);

        $this->assertDatabaseHas((new ActivityLogs)->getTable(), [
            'user_id' => $activityLogData['user_id'],
            'action' => $activityLogData['action'],
            'details' => $activityLogData['details'],
        ]);
    }

    public function test_update_activity_log(): void
    {
        $activityLog = ActivityLogs::factory()->create();

        $updatedData = $activityLog->toArray();
        $updatedData['action'] = 'updated';

        $this->activityLog->updateActivityLog($updatedData, $activityLog->id);

        $this->assertDatabaseHas((new ActivityLogs)->getTable(), [
            'id' => $activityLog->id,
            'action' => 'updated',
        ]);
    }
}
