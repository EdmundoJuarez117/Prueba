<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cmodalidad;
class CmodalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


		public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:modalidades.index'); // protege todas las funciones
			// $this->middleware('can:modalidades.index')->only('index'); // protege solo una función
			// $this->middleware('can:modalidades.edit')->only('edit', 'update'); // protege más de una función
		}

		function cmp($a, $b) {
		    return strcmp($a->name, $b->name);
		}



    public function index(Request $request, $offset=0, $data=NULL)
    {
        $var = "miguel";
				$this->seccionTitulo = 'Modalidades';
				$dataSearch = json_decode($data);

				if(! isset($dataSearch)){
                    $obj = new \stdClass;
                    $obj->nombre = '';
                    $dataSearch = $obj;
                }

				$resultSet = Cmodalidad::getForPagination($offset, $limit=10, $dataSearch);
				$modalidades = $resultSet['data'];
				$totalData = $resultSet['countData'];

				if($request->ajax())
				{
					return [
						'dataGrid' => $modalidades,
						'dataCount' => $totalData
					];
					// $modalidades;
				}

				$data = [
					'seccion_titulo' => $this->seccionTitulo,
					'modalidades' => $modalidades,
					'totalData' => $totalData
				];
				// var_dump($data); die();
				return view('modalidades.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
				echo "create function";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
			$this->validate($request, [
				'nombre' => 'required|unique:c_modalidad,nombre',
			]);

			try {
				/*$array = [
					'nombre' => $request->all()['nombre']
				];
				$result = Cmodalidad::create($array);*/

				$modalidad = new Cmodalidad;
				$modalidad->nombre = $request->all()['nombre'];
				$result = $modalidad->save();

				return response()->json([
					'result' => $result,
					'message' => '',
				]);
			} catch (\Illuminate\Database\QueryException $exception) {
				$errorCode = $exception->errorInfo[1];
				if($errorCode == 1062){
					// houston, we have a duplicate entry problem
				}
				return response()->json([
					'result' => FALSE,
					'message' => $exception->getMessage(),
				]);

			}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cmodalidad  $cmodalidad
     * @return \Illuminate\Http\Response
     */
    public function show(Cmodalidad $cmodalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cmodalidad  $cmodalidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Cmodalidad $cmodalidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cmodalidad  $cmodalidad
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Cmodalidad $modalidade)
    {
			$result = TRUE;
			$message = "";

			try {
				$id = $request->all()['id'];
				$this->validate($request, [
					'nombre' => 'required|unique:c_modalidad,nombre,'.$id,
				]);
				$result = $modalidade->update($request->all());
				$message = ($result)?"":"Reintente por favor";

			} catch (\Illuminate\Database\QueryException $exception) {
				$result = FALSE;
				$message = $exception->getMessage();
			}

			return response()->json([
				'result' => $result,
				'message' => $message
			]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cmodalidad  $cmodalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cmodalidad $cmodalidad)
    {
        //
    }
}
