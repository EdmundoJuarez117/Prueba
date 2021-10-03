<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cplanestudio extends Model
{
    use HasFactory;
    protected $table = "c_planestudio";

    const CREATED_AT = "fcreacion";
    const UPDATED_AT = "fmodificacion";

    protected $fillable = [
        "id",
        "nombre",
        "nombre_corto",
        "estatus",
        "idcarrera"
      ];
  
      public static function getForPagination($ofset, $limit, $dataSearch){
        $countData = \DB::table('c_planestudio')->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
                ->count();
        
  
        $data = self::
        select('id', 'nombre', 'nombre_corto', 'estatus')
        ->where('nombre', 'like', '%'.$dataSearch->nombre.'%')
        ->orderBy('nombre')
        ->offset($ofset)
        ->limit($limit)->get();
        return ['countData' => $countData, 'data' => $data];
      }
}