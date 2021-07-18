<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseGenerator;
use App\Repositories\Model\Team\TeamRepository;

class TeamController extends Controller
{
    protected $teamRepo;

    public function __construct(TeamRepository $teamRepo) {
        $this->teamRepo = $teamRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $teams = $this->teamRepo->getAll($id);
        
        $response = ResponseGenerator::createApiResponse(false, 200, "Team datas", $teams);
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
        $team = $this->teamRepo->showDetail($id, $team_id);

        $response = ResponseGenerator::createApiResponse(false, 200, "Team data", $team);
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
