<?php

namespace App\Http\Controllers;

use App\Repositories\InteractionRepository;
use App\Data\InteractionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InteractionController extends Controller
{
    public function __construct(private InteractionRepository $interactionRepository) {}

    public function index()
    {
        return view('interactions.index');
    }

    public function create()
    {
        return view('interactions.create');
    }

    public function store(InteractionData $request)
    {
        $this->interactionRepository->storeInteraction($request->validated());

        return Redirect::route('interactions.index');
    }

    public function update(InteractionData $request, int $id)
    {
        $this->interactionRepository->updateInteraction($request->validated(), $this->interactionRepository->getInteractionById($id));

        return Redirect::route('interactions.index');
    }

    public function search(Request $request)
    {
        return InteractionData::collect(QueryBuilder::for(Interaction::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }

}
