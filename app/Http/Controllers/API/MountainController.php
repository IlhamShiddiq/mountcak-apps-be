<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseGenerator;
use App\Repositories\Model\Mountain\MountainRepository;

class MountainController extends Controller
{
    protected $mountainRepo;

    public function __construct(MountainRepository $mountainRepo) {
        $this->mountainRepo = $mountainRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mountains = $this->mountainRepo->getAll();
        
        $response = ResponseGenerator::createApiResponse(false, 200, "Mountain datas", $mountains);
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
     * @param  \App\Models\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mountain = $this->mountainRepo->showDetail($id);

        $response = ResponseGenerator::createApiResponse(false, 200, "Mountain data", $mountain);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function edit(Mountain $mountain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mountain $mountain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mountain $mountain)
    {
        //
    }
}
