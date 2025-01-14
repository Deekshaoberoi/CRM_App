<?php

namespace App\Http\Controllers;

use App\Data\OpportunityData;
use App\Repositories\OpportunityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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

    public function search(Request $request)
    {
        return OpportunityData::collect(QueryBuilder::for(Opportunity::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}
