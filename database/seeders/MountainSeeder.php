<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mountain;
use Ramsey\Uuid\Uuid;

class MountainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mountains = array(
            [
                "id" => Uuid::uuid4(),
                "name" => "Gunung Papandayan",
                "city" => "Garut, Jawa Barat",
                "max_climber" => 5,
                "day_duration" => 3,
                "night_duration" => 2,
                "price" => 35000,
                "is_open" => 0,
                "is_team_available" => 1
            ],
            [
                "id" => Uuid::uuid4(),
                "name" => "Gunung Bromo",
                "city" => "Probolinggo, Jawa Timur",
                "max_climber" => 5,
                "day_duration" => 3,
                "night_duration" => 2,
                "price" => 50000,
                "is_open" => 0,
                "is_team_available" => 1
            ],
        );

        Mountain::insert($mountains);
    }
}
