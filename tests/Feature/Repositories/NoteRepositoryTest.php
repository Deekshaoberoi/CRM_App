<?php

namespace Tests\Feature\Repositories;

use App\Models\Note;
use App\Repositories\NoteRepository;
use Tests\TestCase;

class NoteRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private NoteRepository $note;

    protected function setUp(): void
    {
        parent::setUp();

        $this->note = app(NoteRepository::class);
    }

    public function test_get_Note_by_id(): void
    {
        $note = Note::factory()->create();

        $this->assertEquals(Note::class, get_class($this->note->getNoteById($note->id)));
    }

    public function test_store_note(): void
    {
        $note = Note::factory()->make();

        $this->note->storeNote($note->getData());

        $this->assertDatabaseHas((new Note)->getTable(), [
            'related_to' => $note->related_to,
            'related_id' => $note->related_id,
            'content' => $note->content,
            'created_by' => $note->created_by,
        ]);
    }

    public function test_update_note(): void
    {
        $note = Note::factory()->create();

        $note->content = 'This is a test note';

        $this->note->updateNote($note->getData(), $note);

        $this->assertDatabaseHas((new Note)->getTable(), [
            'id' => $note->id,
            'content' => $note->content,
            
        ]);
    }

    public function test_delete_Note(): void
    {
        $note = Note::factory()->create();

        $this->note->deleteNoteById($note->id);

        $this->assertDatabaseMissing((new Note)->getTable(), [
            'id' => $note->id,
        ]);
    }
}
