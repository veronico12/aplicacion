<?php

namespace Aplicacion;

use Illuminate\Database\Eloquent\Model;
use DB;
class archivos extends Model
{
    //generar nombre de tabla
    protected $table="archivos";
    protected $fillable = ['nombrear','ruta2','extencion'];
}
