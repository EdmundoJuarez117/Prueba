<?php

namespace Database\Seeders;

use App\Models\Clocalidad;
use Illuminate\Database\Seeder;

class ClocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localidades = [
            ['id' => 187850, 'nombre' => 'AMOZOC DE MOTA', 'idmunicipio' => 1567],
            ['id' => 187851, 'nombre' => 'VALLARTA', 'idmunicipio' => 1567],
            ['id' => 187852, 'nombre' => 'CONCEPCIÓN CAPULAC (LA EX-HACIENDA)', 'idmunicipio' => 1567],
            ['id' => 187853, 'nombre' => 'SAN JACINTO', 'idmunicipio' => 1567],
            ['id' => 187854, 'nombre' => 'SAN JOSÉ', 'idmunicipio' => 1567],
            ['id' => 187855, 'nombre' => 'SAN NICOLÁS', 'idmunicipio' => 1567],
            ['id' => 187856, 'nombre' => 'SAN JOSÉ LA LAGUNA', 'idmunicipio' => 1567],
            ['id' => 187857, 'nombre' => 'GUADALUPE', 'idmunicipio' => 1567],
            ['id' => 187858, 'nombre' => 'LOS PINOS', 'idmunicipio' => 1567],
            ['id' => 187859, 'nombre' => 'SAN MIGUEL CUAUHTENCO', 'idmunicipio' => 1567],
            ['id' => 187860, 'nombre' => 'SAN LUIS DEL MONTE', 'idmunicipio' => 1567],
            ['id' => 187861, 'nombre' => 'SAN MATEO', 'idmunicipio' => 1567],
            ['id' => 187862, 'nombre' => 'CASA BLANCA', 'idmunicipio' => 1567],
            ['id' => 187863, 'nombre' => 'LOS NOGALES', 'idmunicipio' => 1567],
            ['id' => 187864, 'nombre' => 'EL ENCANTO (LOS GALICIA)', 'idmunicipio' => 1567],
            ['id' => 187865, 'nombre' => 'POTONQUI (LOS ROJAS)', 'idmunicipio' => 1567],
            ['id' => 187866, 'nombre' => 'EL COLORADO', 'idmunicipio' => 1567],
            ['id' => 187867, 'nombre' => 'LA RIVERA', 'idmunicipio' => 1567],
            ['id' => 187868, 'nombre' => 'SAN RAMÓN', 'idmunicipio' => 1567],
            ['id' => 187869, 'nombre' => 'SAN SALVADOR TEPALCAYUCA', 'idmunicipio' => 1567],
            ['id' => 187870, 'nombre' => 'GUADALUPE VICTORIA (GUADALUPE DEL MORAL)', 'idmunicipio' => 1567],
            ['id' => 187871, 'nombre' => 'CONJUNTO CAMPESTRE HARAS', 'idmunicipio' => 1567],
            ['id' => 187872, 'nombre' => 'LA LAGUNA', 'idmunicipio' => 1567],
            ['id' => 187873, 'nombre' => 'AGUA SANTA II', 'idmunicipio' => 1567],
            ['id' => 187874, 'nombre' => 'SAN PEDRO', 'idmunicipio' => 1567],
            ['id' => 187875, 'nombre' => 'LAS ÁNIMAS (EX-RANCHO LAS ÁNIMAS)', 'idmunicipio' => 1567],
            ['id' => 187876, 'nombre' => 'SAN MARTÍN', 'idmunicipio' => 1567],
            ['id' => 187877, 'nombre' => 'SAN JOSÉ DE LOS ÁNGELES KILÓMETRO 22', 'idmunicipio' => 1567],
            ['id' => 187878, 'nombre' => 'AMPLIACIÓN SAN JUAN 3RA. SECCIÓN', 'idmunicipio' => 1567],
            ['id' => 187879, 'nombre' => 'EL ESFUERZO', 'idmunicipio' => 1567],
            ['id' => 187880, 'nombre' => 'IGNACIO ZARAGOZA', 'idmunicipio' => 1567],
            ['id' => 187881, 'nombre' => 'JOSÉ LINO MIGUEL LÓPEZ DE LA ROSA', 'idmunicipio' => 1567],
            ['id' => 187882, 'nombre' => 'SANTA CLARA', 'idmunicipio' => 1567],
            ['id' => 187883, 'nombre' => 'MAXIXARNO (TECUADRA)', 'idmunicipio' => 1567],
            ['id' => 187884, 'nombre' => 'LA OCOTERA', 'idmunicipio' => 1567],
            ['id' => 187885, 'nombre' => 'PAPALCORONA', 'idmunicipio' => 1567],
            ['id' => 187886, 'nombre' => 'LA POZA', 'idmunicipio' => 1567],
            ['id' => 187887, 'nombre' => 'SAN JUAN', 'idmunicipio' => 1567],
            ['id' => 187888, 'nombre' => 'SAN LUIS', 'idmunicipio' => 1567],
            ['id' => 187889, 'nombre' => 'GRANJAS NOGALES', 'idmunicipio' => 1567],
            ['id' => 187890, 'nombre' => 'LA VENTA', 'idmunicipio' => 1567],
            ['id' => 187891, 'nombre' => 'EL TEPEYAC', 'idmunicipio' => 1567],
            ['id' => 187892, 'nombre' => 'CENTENO', 'idmunicipio' => 1567],
            ['id' => 187893, 'nombre' => 'LOS ÁLAMOS', 'idmunicipio' => 1567],
            ['id' => 187894, 'nombre' => 'LOS ÁLAMOS', 'idmunicipio' => 1567],
            ['id' => 187895, 'nombre' => 'LA PROVIDENCIA 2DA. SECCIÓN VALLARTITO', 'idmunicipio' => 1567],
            ['id' => 187896, 'nombre' => 'GUADALUPE', 'idmunicipio' => 1567],
            ['id' => 187897, 'nombre' => 'CAMINO REAL', 'idmunicipio' => 1567],
        ];

        foreach ($localidades as $item) {
            $localidad = new Clocalidad();
            $localidad->id = $item['id'];
            $localidad->nombre = $item['nombre'];
            $localidad->idmunicipio = $item['idmunicipio'];
            $localidad->save();
        }

    }
}
