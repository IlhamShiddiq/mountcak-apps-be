<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Helpers\ResponseGenerator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $teams = Team::join('mountains', 'mountains.id', '=', 'teams.mountain_id')
                    ->join('users', 'users.id', '=', 'teams.leader_id')
                    ->where('mountain_id', $id)
                    ->get(['teams.*', 'mountains.name AS mountain_name', 'mountains.price AS price', 'users.image AS leader_image', 'users.name AS leader_name']);

        $responseContent = TeamResource::collection($teams);
        $response = ResponseGenerator::createApiResponse(false, 200, "Team datas", $responseContent);
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $team_id)
    {
        $team = Team::join('mountains', 'mountains.id', '=', 'teams.mountain_id')
                    ->join('users', 'users.id', '=', 'teams.leader_id')
                    ->where('teams.id', $team_id)
                    ->get(['teams.*', 'mountains.name AS mountain_name', 'mountains.price AS price', 'users.image AS leader_image', 'users.name AS leader_name'])
                    ->first();

        $responseContent = new TeamResource($team);
        $response = ResponseGenerator::createApiResponse(false, 200, "Team data", $responseContent);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
