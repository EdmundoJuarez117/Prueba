<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ccarrera;
class CcarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:carreras.index'); // protege todas las funciones
		}

		function cmp($a, $b) {
		    return strcmp($a->name, $b->name);
		}
        
        public function index(Request $request, $offset=0, $data=NULL){
          $var = "miguel";
          $this-> seccionTitulo = 'Carreras';
          $dataSearch = json_decode($data);
  
          if(! isset($dataSearch)){
                      $obj = new \stdClass;
                      $obj->nombre = '';
                      $dataSearch = $obj;
                  }
          
      
            $resultSet = Ccarrera::getForPagination($offset, $limit=10, $dataSearch);
            $carreras = $resultSet['data'];
            $totalData = $resultSet['countData'];
      
            if($request->ajax()){
              
              return [
              'dataGrid' => $carreras, 
              'dataCount' => $totalData];
        }
        $data = ['seccion_titulo' => $this->seccionTitulo, 'carreras' => $carreras, 'totalData' => $totalData];
  
        return view('carreras.index', $data);
      }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        echo "create function";
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, ['nombre' => 'required|unique:c_carrera,nombre']);
        try{
          $carrera = new Ccarrera;
          $carrera->nombre = $request->all()['nombre'];
          $result = $carrera->save();
  
          return response()->json(['result' => $result, 'message' => '']);
        
        }catch (\Iluminate\Database\QueryException $exception) {
          $errorCode = $exception->errorInfo[1];
          if($errorCode == 1062){
  
          }
          return response()->json(['result' => FALSE, 'message' => $exception->getMessage()]);
        }
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ccarrera $ccarrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ccarrera $ccarrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ccarrera $carreras ){
  
        $result = TRUE;
        $message = "";
  
        try{
          $id = $request->all()['id'];
          $this->validate($request,['nombre' => 'required|unique:c_carrera,nombre,'.$id]);
          $result = $carreras->update($request->all());
          $message = ($result)?"":"Reintente por favor";
  
        }catch (\Illuminate\Database\QueryException $exception){
  
          $result = FALSE;
          $message = $exception->getMessage();
        }
  
        return response()->json(['result' => $result, 'message' => $message]);
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
