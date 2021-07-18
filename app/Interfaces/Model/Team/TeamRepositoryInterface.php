<?php

namespace App\Interfaces\Model\Team;

use Illuminate\Http\Request;

interface TeamRepositoryInterface {
    public function getAll($id);

    public function getAllWithPagination();

    public function showDetail($id, $team_id);

    public function store(Request $request);

    public function update(Request $request, $id);

    public function delete($id);
}