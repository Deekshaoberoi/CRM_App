<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class RoleUserController extends Controller
{
    public function addRole(Request $request, int $id)
    {
        $user = User::find($id);
        $role = Role::find($request->role_id);
        $user->roles()->attach($role, ['team_id' => $request->team_id]);

        return Redirect::route('users.index');
    }

    public function removeRole(Request $request, int $id)
    {
        $user = User::find($id);
        $role = Role::find($request->role_id);
        $user->roles()->detach($role);

        return Redirect::route('users.index');
    }

    public function search(Request $request)
    {
        return QueryBuilder::for(RoleUser::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get();
    }
}
