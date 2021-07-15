<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class SuperUserSeeder extends Seeder
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
            "name" => "Super User",
            "email" => "superuser@superuser.com",
            "password" => bcrypt("superuser"),
            "gender" => "L",
            "address" => "Unknown Place",
            "telp" => "1234567890"
        ]);
    }
}
