<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cescalaeval extends Model
{
    use HasFactory;
    protected $table = "c_escalaeval";

    const CREATED_AT = "fcreacion";
    const UPDATED_AT = "fmodificacion";

    protected $fillable = [
      "id",
      "nombre",
      "calificacion_min",
      "calificacion_max"
    ];

    public static function getForPagination($ofset, $limit, $dataSearch){
      $countData = \DB::table('c_escalaeval')->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
      ->count();
      

      $data = self::
      select('id', 'nombre', 'calificacion_min', 'calificacion_max')
      ->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
      ->orderBy('nombre')
      ->offset($ofset)
      ->limit($limit)->get();
      return ['countData' => $countData, 'data' => $data];
    }

}