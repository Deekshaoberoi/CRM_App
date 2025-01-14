<?php

namespace App\Http\Controllers;

use App\Data\UserData;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct(private UserRepository $usersRepository) {}

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserData $request)
    {
        $this->usersRepository->storeUser($request->validated());

        return Redirect::route('users.index');
    }

    public function update(UserData $request, int $id)
    {
        $this->usersRepository->updateUser($request->validated(), $this->usersRepository->getUserById($id));

        return Redirect::route('users.index');
    }
}
