<?php

namespace Database\Seeders;

use App\Models\Vacation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTablesSeeder::class);
        $this->call(RolesTablesSeeder::class);
        $this->call(VacationsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(MatieresTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
    }
}
