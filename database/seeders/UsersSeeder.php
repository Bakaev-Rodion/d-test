<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[[
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 1,
            'team_id' => 1
        ],[
            'name' => 'teamlead1',
            'email' => 'tm1@tm1.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 2,
            'team_id' => 2
        ],[
            'name' => 'teamlead2',
            'email' => 'tm2@tm2.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 2,
            'team_id' => 3
        ],[
            'name' => 'buyer1',
            'email' => 'b1@b1.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 3,
            'team_id' => 2
        ],[
            'name' => 'buyer2',
            'email' => 'b2@b2.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 3,
            'team_id' => 2
        ],[
            'name' => 'buyer3',
            'email' => 'b3@b3.com',
            'password' => bcrypt('qwerty'),
            'email_verified_at' => now(),
            'role_id' => 3,
            'team_id' => 3
        ]];
        foreach($users as $user){
            User::create($user);
        }

    }
}
