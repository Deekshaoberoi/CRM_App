<?php

namespace Tests\Feature\Repositories;

use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Tests\TestCase;

class TicketRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private TicketRepository $ticket;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ticket = app(TicketRepository::class);
    }

    public function test_get_Ticket_by_id(): void
    {
        $ticket = Ticket::factory()->create();

        $this->assertEquals(Ticket::class, get_class($this->ticket->getTicketById($ticket->id)));
    }

    public function test_store_ticket(): void
    {
        $ticket = Ticket::factory()->make();

        $this->ticket->storeTicket($ticket->getData());

        $this->assertDatabaseHas((new Ticket)->getTable(), [
            'customer_id' => $ticket->customer_id,
            'subject' => $ticket->subject,
            'description' => $ticket->description,
            'priority' => $ticket->priority,
            'status' => $ticket->status,
            'assigned_to' => $ticket->assigned_to,
        ]);
    }

    public function test_update_ticket(): void
    {
        $ticket = Ticket::factory()->create();

        $ticket->description = 'This is a test ticket';

        $this->ticket->updateTicket($ticket->getData(), $ticket);

        $this->assertDatabaseHas((new Ticket)->getTable(), [
            'id' => $ticket->id,
            'description' => $ticket->description,
            
        ]);
    }
}