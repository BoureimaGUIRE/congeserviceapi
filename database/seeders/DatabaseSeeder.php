<?php

namespace Database\Seeders;

use App\Models\Conge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UsersTableSeeder');
        Conge::factory(10)->create();
    }
}
