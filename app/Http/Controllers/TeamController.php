<?php

namespace App\Http\Controllers;

use App\Data\TeamData;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TeamController extends Controller
{
    public function __construct(private TeamRepository $teamRepository) {}

    public function index()
    {
        return view('teams.index');
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(TeamData $request)
    {
        $this->teamRepository->storeTeam($request->validated());

        return Redirect::route('teams.index');
    }

    public function update(TeamData $request, int $id)
    {
        $this->teamRepository->updateTeam($request->validated(),
            $this->teamRepository->getTeamById($id));

        return Redirect::route('teams.index');
    }

    public function search(Request $request)
    {
        return TeamData::collect(QueryBuilder::for(Team::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }

    public function addMember(Request $request, int $id)
    {
        $team = $this->teamRepository->getTeamById($id);
        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);

        $team->users()->attach($user, ['role_id' => $role->id]);

        return Redirect::route('teams.index');
    }

    public function removeMember(Request $request, int $id)
    {
        $team = $this->teamRepository->getTeamById($id);
        $user = User::find($request->user_id);

        $team->users()->detach($user);

        return Redirect::route('teams.index');
    }
}
