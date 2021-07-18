<?php

namespace App\Repositories\Model\Mountain;

use App\Interfaces\Model\Mountain\MountainRepositoryInterface;
use App\Models\Mountain;
use Illuminate\Http\Request;
use App\Http\Resources\MountainResource;

class MountainRepository implements MountainRepositoryInterface {
    public function getAll() {
        $mountains = Mountain::all();
        
        return MountainResource::collection($mountains);
    }

    public function getAllWithPagination() {
        return 'a';
    }

    public function showDetail($id) {
        $mountain = Mountain::find($id);
        
        return new MountainResource($mountain);
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