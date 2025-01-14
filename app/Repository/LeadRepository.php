<?php

namespace App\Repositories;

use App\Data\LeadData;
use App\Models\Lead;

class LeadRepository
{
    public function getLeadById(int $id, $relations = []): Lead
    {
        return Lead::with($relations)->findOrFail($id);
    }

    public function storeLead(LeadData $leadData): Lead
    {
        $lead = new Lead;
        $lead->fill($leadData->except('id')->toArray());
        $lead->save();

        return $lead;
    }

    public function updateLead(LeadData $leadData, Lead $lead)
    {
        $lead->fill($leadData->except('id')->toArray());
        $lead->update();

        return $lead;
    }

    public function deleteLead(Lead $lead): bool
    {
        return $lead->delete();
    }
}
