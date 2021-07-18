<?php

namespace App\Interfaces\Model\User;

use Illuminate\Http\Request;

interface UserRepositoryInterface {
    public function getAll();

    public function getAllWithPagination();

    public function showDetail($id, $withCollection);

    public function store(array $data);

    public function update(array $data, $id);

    public function updatePicture($data, $id);

    public function updatePassword($data, $id);

    public function delete($id);
}