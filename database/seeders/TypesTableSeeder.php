<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['name' => 'Permanent contract']);
        Type::create(['name' => 'Fixed term contract']);
        Type::create(['name' => 'Temporary or interim employment contract']);
        Type::create(['name' => 'Apprenticeship contract']);
        Type::create(['name' => 'Professional contract']);
        Type::create(['name' => 'Single integration contract']);
        Type::create(['name' => 'Employment support contract']);
        Type::create(['name' => 'Employment initiative contract']);
    }
}
