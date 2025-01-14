<?php

namespace App\Http\Controllers;

use App\Data\NoteData;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NoteController extends Controller
{
    public function __construct(private NoteRepository $noteRepository) {}

    public function index()
    {
        return view('notes.index');
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteData $request)
    {
        $this->noteRepository->storeNotes($request->validated());

        return Redirect::route('notes.index');
    }

    public function update(NoteData $request, int $id)
    {
        $this->noteRepository->updateNotes($request->validated(), $this->notesRepository->getNotesById($id));

        return Redirect::route('notes.index');
    }

    public function search(Request $request)
    {
        return NoteData::collect(QueryBuilder::for(ActivityLog::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}
