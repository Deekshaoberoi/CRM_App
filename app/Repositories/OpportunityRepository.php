<?php

namespace App\Repositories;

use App\Models\Opportunity;
use App\Data\OpportunityData;

class OpportunityRepository
{
    public function getOpportunityById(int $id, $relations = []): Opportunity
    {
        return Opportunity::with($relations)->findOrFail($id);
    }

    public function storeOpportunity(OpportunityData $opportunityData): Opportunity
    {
        $opportunity = new Opportunity;
        $opportunity->fill($opportunityData->except('id')->toArray());
        $opportunity->save();

        return $opportunity;
    }

    public function updateOpportunity(OpportunityData $opportunityData, Opportunity $opportunity)
    {
        $opportunity->fill($opportunityData->except('id')->toArray());
        $opportunity->update();

        return $opportunity;
    }

    public function deleteOpportunity(Opportunity $opportunity): bool
    {
        return $opportunity->delete();
    }
}
