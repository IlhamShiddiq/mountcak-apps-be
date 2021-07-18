<?php

namespace App\Repositories\Model\Team;

use App\Interfaces\Model\Team\TeamRepositoryInterface;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Resources\TeamResource;

class TeamRepository implements TeamRepositoryInterface {
    public function getAll($id) {
        $teams = Team::join('mountains', 'mountains.id', '=', 'teams.mountain_id')
                    ->join('users', 'users.id', '=', 'teams.leader_id')
                    ->where('mountain_id', $id)
                    ->get(['teams.*', 'mountains.name AS mountain_name', 'mountains.price AS price', 'users.image AS leader_image', 'users.name AS leader_name']);
        
        return TeamResource::collection($teams);
    }

    public function getAllWithPagination() {
        return 'a';
    }

    public function showDetail($id, $team_id) {
        $team = Team::join('mountains', 'mountains.id', '=', 'teams.mountain_id')
                    ->join('users', 'users.id', '=', 'teams.leader_id')
                    ->where('teams.id', $team_id)
                    ->get(['teams.*', 'mountains.name AS mountain_name', 'mountains.price AS price', 'users.image AS leader_image', 'users.name AS leader_name'])
                    ->first();
        
        return new TeamResource($team);
    }

    public function store(Request $request) {
        return 'a';
    }

    public function update(Request $request, $id) {
        return 'a';
    }

    public function delete($id) {
        return 'a';
    }
}