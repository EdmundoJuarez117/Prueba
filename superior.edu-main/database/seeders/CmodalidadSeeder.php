<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Cmodalidad;

class CmodalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				$modalidad = new Cmodalidad();
        $modalidad->nombre = "ESCOLARIZADA";
        $modalidad->save();

				$modalidad = new Cmodalidad();
        $modalidad->nombre = "MIXTA";
        $modalidad->save();
    }
}
