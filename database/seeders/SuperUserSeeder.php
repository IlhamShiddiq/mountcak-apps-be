<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            "name" => "Super User",
            "email" => "superuser@superuser.com",
            "password" => bcrypt("superuser"),
            "address" => "Unknown Place",
            "phone" => "1234567890"
        ]);
    }
}
