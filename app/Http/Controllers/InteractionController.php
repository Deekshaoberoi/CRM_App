<?php

namespace App\Http\Controllers;

use App\Repositories\InteractionRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\InteractionData;

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
}
