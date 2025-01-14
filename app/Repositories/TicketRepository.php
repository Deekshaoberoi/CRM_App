<?php

namespace App\Repositories;

use App\Data\TicketData;
use App\Models\Ticket;

class TicketRepository
{
    public function getTicketById(int $id, $relations = []): Ticket
    {
        return Ticket::with($relations)->findOrFail($id);
    }

    public function storeTicket(TicketData $ticketData): Ticket
    {
        $ticket = new Ticket;
        $ticket->fill($ticketData->except('id')->toArray());
        $ticket->save();

        return $ticket;
    }

    public function updateTicket(TicketData $ticketData, Ticket $ticket)
    {
        $ticket->fill($ticketData->except('id')->toArray());
        $ticket->update();

        return $ticket;
    }

    public function deleteTicket(Ticket $ticket): bool
    {
        return $ticket->delete();
    }
}
