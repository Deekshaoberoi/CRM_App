<?php

namespace App\Http\Controllers;

use App\Repositories\OpportunityRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\OpportunityData;

class OpportunityController extends Controller
{
    public function __construct(private OpportunityRepository $opportunityRepository) {}

    public function index()
    {
        return view('opportunities.index');
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(OpportunityData $request)
    {
        $this->opportunityRepository->storeOpportunity($request->validated());

        return Redirect::route('opportunities.index');
    }

    public function update(OpportunityData $request, int $id)
    {
        $this->opportunityRepository->updateOpportunity($request->validated(), $this->opportunityRepository->getOpportunityById($id));

        return Redirect::route('opportunities.index');
    }
}
