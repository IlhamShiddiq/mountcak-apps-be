<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Mountain;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_generaluser_id = User::where('email', 'generaluser@generaluser.com')->first()->id;
        $first_mountain_id = Mountain::all()->first()->id;

        Team::create([
            'mountain_id' => $first_mountain_id,
            'leader_id' => $first_generaluser_id
        ]);
    }
}
