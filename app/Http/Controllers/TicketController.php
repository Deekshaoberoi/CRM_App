<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\TicketData;

class TicketController extends Controller
{
    public function __construct(private TicketRepository $ticketRepository) {}

    public function index()
    {
        return view('tickets.index');
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(TicketData $request)
    {
        $this->ticketRepository->storeTicket($request->validated());

        return Redirect::route('tickets.index');
    }

    public function update(TicketData $request, int $id)
    {
        $this->ticketRepository->updateTicket($request->validated(), $this->ticketRepository->getTicketById($id));

        return Redirect::route('tickets.index');
    }
}