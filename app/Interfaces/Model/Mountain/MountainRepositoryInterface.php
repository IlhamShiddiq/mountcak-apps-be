<?php

namespace App\Interfaces\Model\Mountain;

use Illuminate\Http\Request;

interface MountainRepositoryInterface {
    public function getAll();

    public function getAllWithPagination();

    public function showDetail($id);

    public function store(Request $request);

    public function update(Request $request, $id);

    public function delete($id);
}