<?php

namespace App\Repositories;

use App\Data\InteractionData;
use App\Models\Interaction;

class InteractionRepository

{
    public function getInteractionById(int $id, $relations = []): Interaction
    {
        return Interaction::with($relations)->findOrFail($id);
    }

    public function storeInteraction(InteractionData $interactionData): Interaction
    {
        $interaction = new Interaction;
        $interaction->fill($interactionData->except('id')->toArray());
        $interaction->save();

        return $interaction;
    }

    public function updateInteraction(InteractionData $interactionData, Interaction $interaction)
    {
        $interaction->fill($interactionData->except('id')->toArray());
        $interaction->update();

        return $interaction;
    }

    public function deleteInteraction(Interaction $interaction): bool
    {
        return $interaction->delete();
    }
}
