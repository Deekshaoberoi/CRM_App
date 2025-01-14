<?php

namespace Tests\Feature\Repositories;

use App\Models\Lead;
use App\Repositories\LeadRepository;
use Tests\TestCase;

class LeadRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private LeadRepository $lead;

    protected function setUp(): void
    {
        parent::setUp();

        $this->lead = app(LeadRepository::class);
    }

    public function test_get_Lead_by_id(): void
    {
        $lead = Lead::factory()->create();

        $this->assertEquals(Lead::class, get_class($this->lead->getLeadById($lead->id)));
    }

    public function test_store_lead(): void
    {
        $lead = Lead::factory()->make();

        $this->lead->storeLead($lead->getData());

        $this->assertDatabaseHas((new Lead)->getTable(), [
              'customer_id' => $lead->customer_id,
              'assigned_to' => $lead->assigned_to,
              'lead_source' => $lead->lead_source,
              'status' => $lead->lead_status,
        ]);
    }

    public function test_update_lead(): void
    {
        $lead = Lead::factory()->create();

        $lead->lead_source = 'website';

        $this->lead->updateLead($lead->getData(), $lead);

        $this->assertDatabaseHas((new Lead)->getTable(), [
            'id' => $lead->id,
            'lead_source' => 'website',
        ]);
    }

    public function test_delete_Lead(): void
    {
        $lead = Lead::factory()->create();

        $this->lead->deleteLead($lead);

        $this->assertDatabaseMissing((new Lead)->getTable(), [
            'id' => $lead->id,
        ]);
    }
}