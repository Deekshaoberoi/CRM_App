<?php

namespace App\Http\Controllers;

use App\Repositories\LeadRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\LeadData;

class LeadController extends Controller
{
    public function __construct(private LeadRepository $leadRepository) {}

    public function index()
    {
        return view('leads.index');
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(LeadData $request)
    {
        $this->leadRepository->storeLead($request->validated());

        return Redirect::route('leads.index');
    }

    public function update(LeadData $request, int $id)
    {
        $this->leadRepository->updateLead($request->validated(), $this->leadRepository->getLeadById($id));

        return Redirect::route('leads.index');
    }
}
