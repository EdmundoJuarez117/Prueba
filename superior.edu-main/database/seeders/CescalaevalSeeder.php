<?php

namespace Database\Seeders;
use App\Models\Cescalaeval;
use Illuminate\Database\Seeder;

class CescalaevalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $escalaeval = new Cescalaeval();
      $escalaeval->nombre = "1-6";
      $escalaeval->calificacion_min = "1";
      $escalaeval->calificacion_max = "6";
      $escalaeval->save();
    
      $escalaeval = new Cescalaeval();
      $escalaeval->nombre = "7-10";
      $escalaeval->calificacion_min = "7";
      $escalaeval->calificacion_max = "10";
      $escalaeval->save();
    }
}
