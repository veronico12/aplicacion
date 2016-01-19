<?php
namespace Aplicacion;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use Session;
class manuales extends Model
{
protected $table="manuales";

protected $fillable = ['nombre','descripcion','ruta','extencion','chekent','nombre2','ruta2','extencion2','id_extras'];

 

public function scopeSearch($query, $nombre){

if(trim($nombre)!=""){
return $query->where('nombre','LIKE',"%$nombre%");//busqueda por solo nombre
//return $query->where(\DB::raw("CONCAT(nombre,'',descripcion)"),'LIKE',"%$nombre%");//busqueda con nombre y descripcion	
}

/*else
if(trim($nombre)==0){
Session::flash('message','no se pudo encontrar su búsqueda ingresada intente de nuevo por favor');
}*/

}

public static function conManuales(){
		   return DB::table('manuales')
			->join('archivos','archivos.id','=','manuales.id_extras')
			->select('manuales.*','archivos.nombrear','archivos.ruta2')
			->get();
	}

	//->select('manuales.*', 'manuales.nombre')
	//		->get();
	
	/*DB::table('manaules')
            ->join('archivos', 'manuales.id', '=', 'archivos.id_extras')
            ->select('manuales.id', 'archivos.nombre')
            ->get();

*/

}
