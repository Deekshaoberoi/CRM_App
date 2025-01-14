<?php

namespace App\Http\Controllers;

use App\Repositories\NotesRepository;
use Illuminate\Support\Facades\Redirect;
use App\Data\NotesData;

class NotesController extends Controller
{
    public function __construct(private NotesRepository $notesRepository) {}

    public function index()
    {
        return view('notes.index');
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NotesData $request)
    {
        $this->notesRepository->storeNotes($request->validated());

        return Redirect::route('notes.index');
    }

    public function update(NotesData $request, int $id)
    {
        $this->notesRepository->updateNotes($request->validated(), $this->notesRepository->getNotesById($id));

        return Redirect::route('notes.index');
    }
}