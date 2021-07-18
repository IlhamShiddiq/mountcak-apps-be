<?php

namespace App\Repositories\Model\User;

use App\Interfaces\Model\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserRepository implements UserRepositoryInterface {
    public function getAll() {

    }

    public function getAllWithPagination() {

    }

    public function showDetail($id, $withCollection) {
        $user = User::find($id);

        if($withCollection) return new UserResource($user);
        else return $user;
    }

    public function store(array $data) {
        $user = User::create($data);

        return $user;
    }

    public function update(array $data, $id) {
        $user = User::find($id)->update($data);

        return $user;
    }

    public function updatePicture($data, $id) {
        $user = User::find($id)->update([
            'image' => $data
        ]);

        return $user;
    }

    public function updatePassword($data, $id) {
        $user = User::find($id)->update([
            'password' => $data
        ]);

        return $user;
    }

    public function delete($id) {

    }
}