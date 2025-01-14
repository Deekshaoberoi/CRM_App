<?php

namespace App\Repositories;

use App\Data\TeamData;
use App\Models\Team;

class TeamRepository
{
    public function getTeamById(int $id, $relations = []): Team
    {
        return Team::with($relations)->findOrFail($id);
    }

    public function storeTeam(TeamData $teamsData): Team
    {
        $team = new Team;
        $team->fill($teamsData->except('id')->toArray());
        $team->save();

        return $team;
    }

    public function updateTeam(TeamData $teamsData, Team $team)
    {
        $team->fill($teamsData->except('id')->toArray());
        $team->update();

        return $team;
    }

    public function deleteTeam(Team $team): bool
    {
        return $team->delete();
    }
}