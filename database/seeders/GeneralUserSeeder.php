<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class GeneralUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id" => Uuid::uuid4(),
            "name" => "General User",
            "email" => "generaluser@generaluser.com",
            "password" => bcrypt("generaluser"),
            "gender" => "L",
            "address" => "Unknown Place",
            "telp" => "0987654321"
        ]);
    }
}
