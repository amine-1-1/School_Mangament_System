<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' => 'aref',
            'last_name'=> 'bonbon',
            'email' => 'bon1bon@test.com',
            'password' => Hash::make('test12345') ,
            'phone_number'=>99999999,
            'classe_id'=>1,
            'Teacher_id'=>1,
            'birth_date'=>'1999-02-17',
            'remember_token'=> Str::random(10),
        ]);
    }
}
