<?php
namespace App\Http\Controllers;
use App\Models\Email;
use App\Data\EmailData;
use App\Repositories\EmailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EmailController extends Controller
{
    public function __construct(private EmailRepository $emailsRepository) {}

    public function create()
    {
        return Inertia::render('Email/Create', [
            'email' => [
                'to' => '',
                'cc' => '',
                'bcc' => '',
            ],
        ]);
    }
    public function store(EmailData $request)
    {
        $this->emailsRepository->storeEmail($request->validated());

        return Redirect::route('emails.index');
    }
    public function destroy(int $id)
    {
        $this->emailsRepository->deleteEmail($id);

        return Redirect::route('emails.index');
    }
}
