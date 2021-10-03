<?php

namespace Database\Seeders;

use App\Models\Centidad;
use Illuminate\Database\Seeder;

class CentidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidades = [
            ['id' => '1', 'nombre' => 'AGUASCALIENTES'],
            ['id' => '2', 'nombre' => 'BAJA CALIFORNIA'],
            ['id' => '3', 'nombre' => 'BAJA CALIFORNIA SUR'],
            ['id' => '4', 'nombre' => 'CAMPECHE'],
            ['id' => '5', 'nombre' => 'COAHUILA DE ZARAGOZA'],
            ['id' => '6', 'nombre' => 'COLIMA'],
            ['id' => '7', 'nombre' => 'CHIAPAS'],
            ['id' => '8', 'nombre' => 'CHIHUAHUA'],
            ['id' => '9', 'nombre' => 'CIUDAD DE MÉXICO'],
            ['id' => '10', 'nombre' => 'DURANGO'],
            ['id' => '11', 'nombre' => 'GUANAJUATO'],
            ['id' => '12', 'nombre' => 'GUERRERO'],
            ['id' => '13', 'nombre' => 'HIDALGO'],
            ['id' => '14', 'nombre' => 'JALISCO'],
            ['id' => '15', 'nombre' => 'MÉXICO'],
            ['id' => '16', 'nombre' => 'MICHOACÁN DE OCAMPO'],
            ['id' => '17', 'nombre' => 'MORELOS'],
            ['id' => '18', 'nombre' => 'NAYARIT'],
            ['id' => '19', 'nombre' => 'NUEVO LEÓN'],
            ['id' => '20', 'nombre' => 'OAXACA'],
            ['id' => '21', 'nombre' => 'PUEBLA'],
            ['id' => '22', 'nombre' => 'QUERÉTARO'],
            ['id' => '23', 'nombre' => 'QUINTANA ROO'],
            ['id' => '24', 'nombre' => 'SAN LUIS POTOSÍ'],
            ['id' => '25', 'nombre' => 'SINALOA'],
            ['id' => '26', 'nombre' => 'SONORA'],
            ['id' => '27', 'nombre' => 'TABASCO'],
            ['id' => '28', 'nombre' => 'TAMAULIPAS'],
            ['id' => '29', 'nombre' => 'TLAXCALA'],
            ['id' => '30', 'nombre' => 'VERACRUZ DE IGNACIO DE LA LLAVE'],
            ['id' => '31', 'nombre' => 'YUCATÁN'],
            ['id' => '32', 'nombre' => 'ZACATECAS']
        ];

        foreach ($entidades as $item) {
            $entidad = new Centidad();
            $entidad->id = $item['id'];
            $entidad->nombre = $item['nombre'];
            $entidad->save();
        }

    }
}
