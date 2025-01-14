<?php

namespace App\Http\Controllers;

use App\Data\RoleData;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoleController extends Controller
{
    public function __construct(private RoleRepository $roleRepository) {}

    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleData $request)
    {
        $this->roleRepository->storeRole($request->validated());

        return Redirect::route('roles.index');
    }

    public function update(RoleData $request, int $id)
    {
        $this->roleRepository->updateRole($request->validated(),
            $this->roleRepository->getRoleById($id));

        return Redirect::route('roles.index');
    }

    public function search(Request $request)
    {
        return RoleData::collect(QueryBuilder::for(Role::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}

