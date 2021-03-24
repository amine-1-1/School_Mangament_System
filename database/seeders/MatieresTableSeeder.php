<?php

namespace Database\Seeders;

use App\Models\Matieres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MatieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matieres::create([

            'name'=> 'Analyse',
            'Teacher_id'=>1,
            'Classe_id'=>1,
        ]);
    }
}
