<?php

namespace App\Repositories;

use App\Models\EmailCampaign;
use App\Data\EmailCampaignData;

class EmailCampaignRepository
{
    public function getEmailCampaignById(int $id, $relations = []): EmailCampaign
    {
        return EmailCampaign::with($relations)->findOrFail($id);
    }

    public function storeEmailCampaign(EmailCampaignData $emailCampaignData): EmailCampaign
    {
        $emailCampaign = new EmailCampaign;
        $emailCampaign->fill($emailCampaignData->except('id')->toArray());
        $emailCampaign->save();

        return $emailCampaign;
    }

    public function updateEmailCampaign(EmailCampaignData $emailCampaignData, EmailCampaign $emailCampaign)
    {
        $emailCampaign->fill($emailCampaignData->except('id')->toArray());
        $emailCampaign->update();

        return $emailCampaign;
    }

    public function deleteEmailCampaign(EmailCampaign $emailCampaign): bool
    {
        return $emailCampaign->delete();
    }
}
