<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams=[
            ['name' => 'Admin team'],
            ['name'=>'team2'],
            ['name'=>'team3']
        ];
        foreach($teams as $team){
            Team::create($team);
        }
    }
}
