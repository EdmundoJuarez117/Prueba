<?php

namespace Database\Seeders;
use App\Models\Cplanestudio;
use Illuminate\Database\Seeder;
class CplanestudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Planestudios
      $planestudio = new Cplanestudio();
      $planestudio->nombre = "Prescencial";
      $planestudio->nombre_corto = "P2021";
      $planestudio->estatus = "1";
      $planestudio->num_creditos_total="99";
      $planestudio->num_creditos_min="7";
      $planestudio->num_creditos_max="9";
      $planestudio->idcarrera = "1";
      $planestudio->save();

      $planestudio = new Cplanestudio();
      $planestudio->nombre = "Online";
      $planestudio->nombre_corto = "O2021";
      $planestudio->estatus = "1";
      $planestudio->num_creditos_total="99";
      $planestudio->num_creditos_min="7";
      $planestudio->num_creditos_max="9";
      $planestudio->idcarrera = "2";
      $planestudio->save();
    }
}
