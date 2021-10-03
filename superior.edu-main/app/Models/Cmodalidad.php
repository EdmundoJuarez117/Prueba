<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cmodalidad extends Model
{
    use HasFactory;

		protected $table = 'c_modalidad';

		const CREATED_AT = "fcreacion";
		const UPDATED_AT = "fmodificacion";

		protected $fillable = [
			'id',
			'nombre',
			'fcreacion',
			'fmodificacion'
		];

		public static function getForPagination($ofset, $limit, $dataSearch)
		{
			/*
			$paginator = self::paginate($limit);
			return [
				'countData' => $paginator->total(),
				'data' => $paginator->items()
			];*/

			// echo "getForPagination"; die();

			// (SELECT COUNT(idproveedor) FROM proveedor) AS total_datos
			// echo self::$table; die();
			// var_dump(self::); die();
			// $count = self::where('status','=','1')->count();

      // var_dump($dataSearch); die();
			//$countData = self::count();
            $countData = \DB::table('c_modalidad')->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
                ->count();

      // var_dump($countData); die();

			$data = self::
			select('id','nombre')
                ->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
			    ->orderBy('nombre')
			    ->offset($ofset)
			    ->limit($limit)->get();

			return [
				'countData' => $countData,
				'data' => $data
			];


			// return self::orderBy('nombre')->offset($ofset)->limit($limit)->get();
		}// getProduct()

}
