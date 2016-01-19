<?php

namespace Aplicacion\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Validator;
use Aplicacion\Http\Requests\RegistrarManual;
use Aplicacion\Http\Requests\ActualizarManual;
use Aplicacion\Http\Requests;
use Aplicacion\Http\Controllers\Controller;

use Aplicacion\manuales;//para llamar al modelo
use Aplicacion\archivos;//para llamar al modelo
use Session;
use Redirect;
use Carbon\Carbon;
use Input;//para llamar el botn input y pasarle el nombre 
use Storage;
use File;
use Illuminate\Routing\Route;
use Illuminate\Validation\Factory;//importacion de la calse para la validacion 


class Manualescontrolador extends Controller
{

public function __construct(Factory $factory)
    {
        $factory->extend('alpha_spaces', function ($attribute, $value, $parameters)
            {
                return preg_match('/^[\pL\s]+$/u', $value);
            },
            'falso'
        );
    }
/*public function boot()
    {
        Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s]+$/u', $value);
});
    }*/

public $file_ext_tolower = FALSE;


public function find(Route $route){
        $manuales =manuales::find($route->getParameter('manuales'));
    if (!$manuales) {
     abort(404);
    }
    }

public function index(Request $request)
    {
      //$manuales=manuales::Search($request->nombre)->orderBy('id','DESC')->paginate(5);
      //aqui cambio la variable nombre
       $manuales=manuales::Search($request->nombre)->orderBy('nombre','ASC')->paginate(5);
      return view('manuales',compact('manuales'));//con esto enviamos la informacion de base manuales
    }


/*public function index(){
    $manuales = manuales::conManuales();
    return $manuales;
    return view('manuales',compact('manuales'));
  }
  */
    
    public function create()
    {
      $archivos= archivos::lists('nombre', 'id');
      return view('manuales',compact('archivos'));
    }

    
public function store(RegistrarManual $request) {
          if($request['check']=="1"){
                      if ($_FILES['archivo2']['error'] == UPLOAD_ERR_NO_FILE) {
                          Session::flash('message2','Porfavor seleccione el archivo extra');
                          return Redirect::to('/manuales');
                          }
                          else{

                              $path1= 'manualess/archivos';
                              $file = $request->file('archivo1');
                              $nombre1=Carbon::now()->second.$file->getClientOriginalName();
                              $extencion=$file->getClientOriginalExtension();
                              $tamano=$file->getSize();
                              $upload=$file->move($path1,$nombre1);
                              rename($path1.'/'.$nombre1, $path1.'/'.Input::get('nombre').'.'.$extencion);
    
                        $path = 'manualess/extras';//nombre de mi subcarpeta
                        $file1= $request->file('archivo2');//obtenemos el campo file definido en el formulario
                        $nombre2= $file1->getClientOriginalName();//obtenemos el nombre del archivo
                        $extencion2=$file1->getClientOriginalExtension();
                           if($extencion2 !='zip' and $extencion2 !='bat' and $extencion2!='rar'){
                                Session::flash('message2','El archivo extra No es valido');
                                return Redirect::to('/manuales');}
                                 else{
                                       
                                    $tamano1=$file1->getSize();//obtenemos tamaño
                                    $upload2=$file1->move($path,$nombre2);//indicamos que queremos guardar un nuevo archivo en el disco local
       
       
                                    manuales::create([
                                        'nombre' =>Input::get('nombre'),
                                        'descripcion' => $request['descripcion'],
                                        'ruta' => $path1.'/'.Input::get('nombre').'.'.$extencion,
                                        'extencion' => $extencion,
                                        'chekent'=>$request['check'],
                                        'nombre2' => $nombre2, 
                                        'ruta2' => $upload2,  
                                        'extencion2' =>$extencion2,
            
                                        ]);
                                          Session::flash('message','Manual Agregado Correctamente');
                                          return Redirect::to('/manuales');
                                      }

                          }
          }else{

///   segundo codigo ////////////////
// manuales::create($request->all());
                  $path1= 'manualess/archivos';//nombre de mi subcarpeta
                  $file = $request->file('archivo1');//obtenemos el campo file definido en el formulario
                  $nombre1=Carbon::now()->second.$file->getClientOriginalName();//obtenemos el nombre del archivo
                  $extencion=$file->getClientOriginalExtension(); //obtenemos la extencion del archivo
       
                     if($extencion !='pdf' and $extencion !='jpg' and $extencion!='mp4'){
                        Session::flash('message2','El archivo No es valido');
                        return Redirect::to('/manuales');}
                     else{
       
       $tamano=$file->getSize();//obtenemos tamaño
       $upload=$file->move($path1,$nombre1);
       //putenv("LD_LIBRERI_PATH");
        //exec("echo 'computadora' | sudo -S cp {$path1}.{$nombre1} gato.pdf");
       rename($path1.'/'.$nombre1, $path1.'/'.Input::get('nombre').'.'.$extencion);
       //if($file->move($path, $name)){
       //Session::flash('success','Cargado correctamente');
       manuales::create([
            'nombre' =>Input::get('nombre'),
            'descripcion' => $request['descripcion'],
            'ruta' => $path1.'/'.Input::get('nombre').'.'.$extencion,
            'extencion' => $extencion,
        ]);
       Session::flash('message','Manual Agregado Correctamente');
       return Redirect::to('/manuales');
   }

  }
}

public function edit($id)
    {
         $manual = manuales::findOrFail($id);
        return view('actualizar_manuales',['manual'=>$manual]);

    }
/*public function show($archivo){
  $public_path = public_path();
     echo $url = $public_path.'/manualess/archivos/'.'ubuntu09'.'.'.'pdf';
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
}
*/
public function leerpdf(){
  //se puede e intentar con estas funciones:
  //Actualizamos el archivo con el nuevo valor
//function incremento_contador($archivo)
// $archivo contiene el numero que actualizamos
/*$contador = 0;

//Abrimos el archivo y leemos su contenido
$fp = fopen($archivo,"r"); 
$contador = fgets($fp, 26); 
fclose($fp);

//Incrementamos el contador
++$contador;

//Actualizamos el archivo con el nuevo valor
$fp = fopen($archivo,"w+"); 
fwrite($fp, $contador, 26); 
fclose($fp); 

echo "Este script ha sido ejecutado $contador veces"; 

$fp = fopen($archivo,"w+"); 
fwrite($fp, $contador, 26); 
fclose($fp)*/
  // fopen Abrimos el archivo y leemos su contenido

$fpPDF=fopen($patharchivo, "rb"); // lee pdf
$size=filesize($patharchivo); // calcula tamanio
$contenido=fread($fpPDF, $size); // lee contendio
$contenido=addslashes($contenido); // formateo
fclose($fpPDF); // cierro el pd
}
//ActualizarManual $request, $id

public function leerarchivopdf(Request $request, $id){
  /*$pureba=fopen($patharchivo, "rb") or die ("Error al leer");
  while (!feof($prueba)) {
   $linea=fgets($prueba);
   $salto_de_linea=nl2br($linea);
   echo $salto_de_linea;
  }
  fclose($prueba);*/
  # incluimos la libreria fdpf
# http://www.fpdf.org/
require_once('fpdf17/fpdf.php');
# incluimos la libreria fpdi
# http://www.setasign.com/products/fpdi/about/
require_once('FPDI-1.5.2/fpdi.php');

# inicializamos el objeto
$pdf = new FPDI();
# definimos el archivo pdf a leer. Nos devuel el numero de paginas
$paginas=$pdf->setSourceFile('linux.pdf');
$pagina=2;
# importamos cada una de las paginas
$templateId=$pdf->importPage($pagina);
# obtenemos el temaño de cada hoja
$size=$pdf->getTemplateSize($templateId);
// create a page definiendo el formato y tamaños
if($size['w'] > $size['h'])
{
  $pdf->AddPage('L',array($size['w'],$size['h']));
}else {
  $pdf->AddPage('P',array($size['w'],$size['h']));
}
$pdf->useTemplate($templateId);
# devolvemos el documento
$pdf->Output();
}



/// Actualizar manual///
public function update(Request $request, $id){
   $manual = manuales::find($id);
   if($manual->chekent=='1'){
      
              if ($_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE and $_FILES['archivo2']['error']==UPLOAD_ERR_NO_FILE ) {
                            $manual = new Manuales;
     
                              $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              // if (trim($value)==''{ }﻿
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }
                                    $manual = manuales::find($id); 
                                    $manual->nombre=$request['nombre'];
                                    $manual->descripcion=$request['descripcion'];
                                    $manual->save();
                                  Session::flash('message','Manual Actualizado Correctamente');
                                  return Redirect::to('/manuales'); 
     
                     } else{

                              if (!$_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE  and !$_FILES['archivo2']['error']==UPLOAD_ERR_NO_FILE  ){
                                $manual = new Manuales;
                                $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                               if ($v->fails()){
                              return redirect()->back()->withInput()->withErrors($v->errors());
                               }

                                $path3= 'manualess/archivos';//nombre de mi subcarpeta
                                $file =$request->file('archivo1');
                                $nombre3=$file->getClientOriginalName();
                                $upload3=$file->move($path3,$nombre3);
                                $extencion3=$file->getClientOriginalExtension();//el problema es la extencion
                                if($extencion3 !='pdf' and $extencion3 !='jpg' and $extencion3!='mp4'){
                                   Session::flash('message2','El archivo No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }else{
                                   if($manual->ruta!=''){
                                      unlink($manual->ruta);
                                       }
                                    }   
                                rename($path3.'/'.$nombre3, $path3.'/'.Input::get('nombre').'.'.$extencion3);
                                 
                                  $path ='manualess/extras';
                                  $file1= $request->file('archivo2');
                                  $nombre2= $file1->getClientOriginalName();
                                  $extencion2=$file1->getClientOriginalExtension();
                                  $upload2=$file1->move($path,$nombre2);
                                  if($extencion2 !='rar' and $extencion2 !='zip' and $extencion2!='bat'){
                                   Session::flash('message2','El archivo Extra No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }else{  
                                   if($manual->ruta2!=''){
                                      unlink($manual->ruta2);
                                       }
                                   }    
                                       
                    
                                $manual = manuales::find($id);
                                $manual->nombre=$request['nombre'];
                                $manual->descripcion=$request['descripcion'];
                                $manual->ruta=$path3.'/'.Input::get('nombre').'.'.$extencion3;
                                $manual->extencion=$extencion3;  
                                     $manual->chekent=$request['check']; 
                                     $manual->nombre2=$nombre2;
                                     $manual->ruta2=$upload2;
                                     $manual->extencion2=$extencion2;
                                $manual->save();
                                Session::flash('message','Manual Actualizado Correctamente');
                                return Redirect::to('/manuales'); 
                                     
                              }
                              


                              if (!$_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE  and $_FILES['archivo2']['error']==UPLOAD_ERR_NO_FILE  ){
                               $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }
                                $path3= 'manualess/archivos';//nombre de mi subcarpeta
                                $file =$request->file('archivo1');
                                $nombre3=$file->getClientOriginalName();
                                $upload3=$file->move($path3,$nombre3);
                                $extencion3=$file->getClientOriginalExtension();//el problema es la extencion
                                
                                if($extencion3 !='pdf' and $extencion3 !='jpg' and $extencion3!='mp4'){
                                   Session::flash('message2','El archivo No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }else{
                                   if($manual->ruta!=''){
                                      unlink($manual->ruta);
                                       }
                                rename($path3.'/'.$nombre3, $path3.'/'.Input::get('nombre').'.'.$extencion3);
                                $manual = new Manuales;
     
                              
                                $manual = manuales::find($id); 
                                $manual->nombre=$request['nombre'];
                                $manual->descripcion=$request['descripcion'];
                                $manual->ruta=$path3.'/'.Input::get('nombre').'.'.$extencion3;
                                $manual->extencion=$extencion3; 
                                $manual->save();
                                Session::flash('message','Manual Actualizado Correctamente');
                                return Redirect::to('/manuales'); 
                              }

                               }else{
                                if ( $_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE  and !$_FILES['archivo2']['error']==UPLOAD_ERR_NO_FILE ){
                               
                              $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }

                                  $path ='manualess/extras';
                                  $file1= $request->file('archivo2');
                                  $nombre2= $file1->getClientOriginalName();
                                  $extencion2=$file1->getClientOriginalExtension();
                                  $upload2=$file1->move($path,$nombre2);  
                               if($extencion2 !='rar' and $extencion2 !='zip' and $extencion2!='bat'){
                                   Session::flash('message2','El archivo extra No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }  else{    
                                   if($manual->ruta2!=''){
                                      unlink($manual->ruta2);
                                       }
                                     }  
                                       $manual = new Manuales;
     
                             
                                $manual = manuales::find($id); 
                                $manual->nombre=$request['nombre'];
                                $manual->descripcion=$request['descripcion'];
                                
                                     $manual->chekent=$request['check']; 
                                     $manual->nombre2=$nombre2;
                                     $manual->ruta2=$upload2;
                                     $manual->extencion2=$extencion2;
                                $manual->save();
                                Session::flash('message','Manual Actualizado Correctamente');
                                return Redirect::to('/manuales'); 

                                 }

                            }


                           }          




        /* final de codigo */
      }


   else{
              if($manual->chekent=='0'){
                    if($request['check']=="1"){
                         if(!$request->hasFile('archivo2')){// si no existe el archivo
                         Session::flash('message2','Porfavor seleccione el archivo extra');
                         $ruta_m="/"."manuales"."/".$id."/"."edit";
                         return Redirect::to($ruta_m);
                         }else{

                        if ($_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE) {
      
                                    $manual = new Manuales;
     
                              $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }


                                  $path ='manualess/extras';
                                  $file1= $request->file('archivo2');
                                  $nombre2= $file1->getClientOriginalName();
                                  $extencion2=$file1->getClientOriginalExtension();
                                  if($extencion2 !='rar' and $extencion2 !='zip' and $extencion2!='bat'){
                                   Session::flash('message2','El archivo Extra No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }
                                  $upload2=$file1->move($path,$nombre2);  
                                     
                                    $manual = new Manuales;
       
                                    $manual = manuales::find($id); 
                                    $manual->nombre=$request['nombre'];
                                    $manual->descripcion=$request['descripcion'];
                                  
                                     $manual->chekent=$request['check']; 
                                     $manual->nombre2=$nombre2;
                                     $manual->ruta2=$upload2;
                                     $manual->extencion2=$extencion2;
                                     $manual->save();
                                  Session::flash('message','Manual Actualizado Correctamente');
                                  return Redirect::to('/manuales');
                              }else{

                                  $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }      


                                $path3= 'manualess/archivos';//nombre de mi subcarpeta
                                $file =$request->file('archivo1');
                                $nombre3=$file->getClientOriginalName();
                                $upload3=$file->move($path3,$nombre3);
                                $extencion3=$file->getClientOriginalExtension();//el problema es la extencion
                                
                                if($extencion3 !='pdf' and $extencion3 !='jpg' and $extencion3!='mp4'){
                                   Session::flash('message2','El archivo No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }  
                                rename($path3.'/'.$nombre3, $path3.'/'.Input::get('nombre').'.'.$extencion3);
                                 

                                  $path ='manualess/extras';
                                  $file1= $request->file('archivo2');
                                  $nombre2= $file1->getClientOriginalName();
                                  $extencion2=$file1->getClientOriginalExtension();
                                  if($extencion2 !='rar' and $extencion2 !='zip' and $extencion2!='bat'){
                                   Session::flash('message2','El archivo Extra No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }
                                  $upload2=$file1->move($path,$nombre2);  
                                  $manual = new Manuales;
     
                              
                                    $manual = manuales::find($id); 
                                    $manual->nombre=$request['nombre'];
                                    $manual->descripcion=$request['descripcion'];
                                    $manual->ruta=$path3.'/'.Input::get('nombre').'.'.$extencion3;
                                    $manual->extencion=$extencion3;  
                                     $manual->chekent=$request['check']; 
                                     $manual->nombre2=$nombre2;
                                     $manual->ruta2=$upload2;
                                     $manual->extencion2=$extencion2;
                                     $manual->save();
                                  Session::flash('message','Manual Actualizado Correctamente');
                                  return Redirect::to('/manuales'); 
                                   }    

                              }

                    }else{


                       if ($_FILES['archivo1']['error']==UPLOAD_ERR_NO_FILE) { 

                                 $manual = new Manuales;
     
                              $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }

                                $manual = manuales::find($id); 
                                $manual->nombre=$request['nombre'];
                                $manual->descripcion=$request['descripcion'];
                                $manual->save(); 
                                Session::flash('message','Manual Actualizado Correctamente');
                                return Redirect::to('/manuales');                     

                            }else{

                                 $v = \Validator::make($request->all(),[
                             'nombre' => 'required|alpha_spaces|min:6|max:50|',
                             'descripcion' => 'required|alpha_spaces|min:10|max:50|',
                             ]);
                              if ($v->fails()){
          return redirect()->back()->withInput()->withErrors($v->errors());
                               }      

                                $path3= 'manualess/archivos';//nombre de mi subcarpeta
                                $file =$request->file('archivo1');
                                $nombre3=$file->getClientOriginalName();
                                $upload3=$file->move($path3,$nombre3);
                                $extencion3=$file->getClientOriginalExtension();//el problema es la extencion
                                rename($path3.'/'.$nombre3, $path3.'/'.Input::get('nombre').'.'.$extencion3);
                                if($extencion3 !='pdf' and $extencion3 !='jpg' and $extencion3!='mp4'){
                                   Session::flash('message2','El archivo No es valido');
                                    $ruta_m="/"."manuales"."/".$id."/"."edit";
                                    return Redirect::to($ruta_m);
                                }else{
                                if($manual->ruta!=''){
                                      unlink($manual->ruta);
                                       }
                                  }     
                               
                                $manual = manuales::find($id); 
                                $manual->nombre=$request['nombre'];
                                $manual->descripcion=$request['descripcion'];
                                $manual->ruta=$path3.'/'.Input::get('nombre').'.'.$extencion3;
                                $manual->extencion=$extencion3; 
                                $manual->save();
                                Session::flash('message','Manual Actualizado Correctamente');
                                return Redirect::to('/manuales');                     


                                }



                    }

              }  

     
          

     }
        


}

function cargar_archivo() {

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "uploads/";
        $config['file_name'] = "nombre_archivo";

        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
    }

public function show($id)
    {
        $manual = manuales::findOrFail($id);
        unlink($manual->ruta);
        if($manual->ruta2!=''){
        unlink($manual->ruta2);
      }
        $manual->delete();

        Session::flash('message','Manual'.' '.$manual->nombre.' '.'Eliminado Correctamente');
        return Redirect::to('/manuales');
    }
 public function destroy($id){
        $manual = manuales::findOrFail($id);
        unlink($manual->ruta);
        if($manual->ruta2!=''){
        unlink($manual->ruta2);
        }
        $manual->delete();  

        Session::flash('message','Manual'.' '.$manual->nombre.' '.'Eliminado Correctamente');
        return Redirect::to('/manuales');
    }


     
}
