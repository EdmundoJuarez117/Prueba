<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\GridPagination;
class TemplateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

			$this->seccionTitulo = 'Plantilla';

			$grid = $this->getGrid();
			// var_dump($grid); die();

			$data = [
				'seccion_titulo'=>$this->seccionTitulo,
				'grid' => $grid
			];

			return view('template', $data);
    }

		
		private function getGrid()
		{
			$columns = [
				"id" => ["type"=>"text", "header" => "ID", "width"=>"10%"],
				"nombre" => ["type"=>"text", "header" => "Descripción", "width"=>"70%"],
				"fregistro" => ["type"=>"text", "header" => "Fecha de registro","width"=>"20%"]
			];

			$grid = new GridPagination();
			$rowsNumbers = 10;
			$offset = $grid->get_offset($_POST, $rowsNumbers);

	    $total_datos = 11;

	    $grid->set_configs_paginador($columns, "id", $tema="", $total_datos, $rowsNumbers);

	    $arr_datos = [
				[
					"id" => 1,
					"nombre" => "Nombre 1",
					"fregistro" => "2021-06-07 08:05:11"
				],
				[
					"id" => 2,
					"nombre" => "Nombre 2",
					"fregistro" => "2021-06-08 08:05:11"
				],
				[
					"id" => 3,
					"nombre" => "Nombre 3",
					"fregistro" => "2021-06-10 08:05:11"
				],
				[
					"id" => 4,
					"nombre" => "Nombre 4",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 5,
					"nombre" => "Nombre 5",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 6,
					"nombre" => "Nombre 6",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 7,
					"nombre" => "Nombre 7",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 8,
					"nombre" => "Nombre 8",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 9,
					"nombre" => "Nombre 9",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 10,
					"nombre" => "Nombre 10",
					"fregistro" => "2021-07-01 12:05:11"
				],
				[
					"id" => 11,
					"nombre" => "Nombre 11",
					"fregistro" => "2021-07-01 12:05:11"
				]
			];

	    $grid->set_data($arr_datos);
	    $strGrid = $grid->get_table();

			return $strGrid;
		}

}
