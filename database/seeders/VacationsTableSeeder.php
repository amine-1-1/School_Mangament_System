<?php

namespace Database\Seeders;

use App\Models\Vacation;
use Illuminate\Database\Seeder;

class VacationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacation::create([
            'teacher_id' => '1',
            'start_date' => '2020-08-20',
            'end_date' => '2020-08-23',
            'reason' => 'school preparation',

        ]);
    }
}
