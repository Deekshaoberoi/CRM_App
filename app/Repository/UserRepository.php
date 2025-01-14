<?php

namespace App\Repositories;

use App\Data\UserData;
use App\Models\User;

class UserRepository
{
    public function getUserById(int $id, $relations = []): User
    {
        return User::with($relations)->findOrFail($id);
    }

    public function storeUser(UserData $usersData): User
    {
        $user = new User;
        $user->fill($UsersData->except('id')->toArray());
        $user->save();

        return $user;
    }

    public function updateUser(UserData $usersData, User $user)
    {
        $user->fill($usersData->except('id')->toArray());
        $user->update();

        return $User;
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
