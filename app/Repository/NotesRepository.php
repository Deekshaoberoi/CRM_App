<?php

namespace App\Repositories;

use App\Data\NotesData;
use App\Models\Notes;

class NotesRepository
{
    public function getNotesById(int $id, $relations = []): Notes
    {
        return Notes::with($relations)->findOrFail($id);
    }

    public function storeNotes(NotesData $notesData): Notes
    {
        $notes = new Notes;
        $notes->fill($notesData->except('id')->toArray());
        $notes->save();

        return $notes;
    }

    public function updateNotes(NotesData $notesData, Notes $notes)
    {
        $notes->fill($notesData->except('id')->toArray());
        $notes->update();

        return $notes;
    }

    public function deleteNotes(Notes $notes): bool
    {
        return $notes->delete();
    }
}
