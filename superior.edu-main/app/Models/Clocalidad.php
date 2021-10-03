<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clocalidad extends Model
{
    use HasFactory;

    protected $table = 'c_localidad';

    const CREATED_AT = "fcreacion";
    const UPDATED_AT = "fmodificacion";
}
