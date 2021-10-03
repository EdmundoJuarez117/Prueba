<?php

namespace Database\Seeders;


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

        $this->call(RoleSeeder::class);

		$this->call(UserSeeder::class);

		$this->call(CmodalidadSeeder::class);

        $this->call(CentidadSeeder::class);

        $this->call(CmunicipioSeeder::class);

        $this->call(ClocalidadSeeder::class);

        $this->call(CcarreraSeeder::class);

        $this->call(CplanestudioSeeder::class);

        $this->call(CescalaevalSeeder::class);

    }
}
