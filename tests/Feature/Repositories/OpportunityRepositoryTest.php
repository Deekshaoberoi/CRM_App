<?php

namespace Tests\Feature\Repositories;

use App\Models\Opportunity;
use App\Repositories\OpportunityRepository;
use Tests\TestCase;

class OpportunityRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private OpportunityRepository $opportunity;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opportunity = app(OpportunityRepository::class);
    }

    public function test_get_Opportunity_by_id(): void
    {
        $opportunity = Opportunity::factory()->create();

        $this->assertEquals(Opportunity::class, get_class($this->opportunity->getOpportunityById($opportunity->id)));
    }

    public function test_store_opportunity(): void
    {
        $opportunity = Opportunity::factory()->make();

        $this->opportunity->storeOpportunity($opportunity->getData());

        $this->assertDatabaseHas((new Opportunity)->getTable(), [
            'customer_id' => $opportunity->customer_id,
            'lead_id' => $opportunity->lead_id,
            'name' => $opportunity->name,
            'amount' => $opportunity->amount,
            'stage' => $opportunity->stage,
            'probability' => $opportunity->probability,
            'close_date' => $opportunity->close_date,
            'description' => $opportunity->description,
            'assigned_to' => $opportunity->assigned_to,
        ]);
    }

    public function test_update_opportunity(): void
    {
        $opportunity = Opportunity::factory()->create();

        $opportunity->description = 'This is a test opportunity';

        $this->opportunity->updateOpportunity($opportunity->getData(), $opportunity);

        $this->assertDatabaseHas((new Opportunity)->getTable(), [
            'id' => $opportunity->id,
            'description' => $opportunity->description,  
        ]);
    }

    public function test_delete_Opportunity(): void
    {
        $opportunity = Opportunity::factory()->create();

        $this->opportunity->deleteOpportunity($opportunity);

        $this->assertDatabaseMissing((new Opportunity)->getTable(), [
            'id' => $opportunity->id,
        ]);
    }
}