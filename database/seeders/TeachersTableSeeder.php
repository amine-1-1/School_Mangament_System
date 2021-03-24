<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'first_name' => 'saoussen',
            'last_name'=> 'bonbon',
            'email' => 'bonbon@test.com',
            'password' => Hash::make('test12345') ,
            'phone_number'=>99999999,
            'classe_id'=>1,
            'Matiere_id'=>1,
            'birth_date'=>'1999-02-17',
            'remember_token'=> Str::random(10),
        ]);
    }
}
