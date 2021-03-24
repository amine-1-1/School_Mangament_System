<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'amine',
            'last_name'=> 'zaddem',
            'email' => 'admin@test.com',
            'password' => Hash::make('test12345') ,
            'role_id' => 1 ,
            'QRpassword'=>'Dammy-CODE-1S4u7lJzehk62xDm3DgYgXXYWtbHE6gSP',
            'remember_token'=> Str::random(10),
        ]);
    }
}
