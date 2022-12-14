<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => "user1",
            'email' => "email1@test.com",
            'password' => Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => "user2",
            'email' => "email2@test.com",
            'password' => Hash::make('password')
        ]);

        $role1 = Role::create([
            "name" => "role1",
            "slug" =>" role1",
        ]);

        sleep(1);
        $role2 = Role::create([
            "name" => "role2",
            "slug" =>" role2",
        ]);

        sleep(1);
        $role3 = Role::create([
            "name" => "role3",
            "slug" =>" role3",
        ]);

        $user1->roles()->sync([
            $role1->id,
            $role3->id
        ]);

        $user2->roles()->sync([
            $role2->id
        ]);
    }
}
