<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplicacion web de consulta de manuales</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('imagenes/tecnicos.ico')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    {!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
</head>

<body>
<div class="container">
        <div class="page-header">
            <center><h1>Control de manuales<small>Técnicos</small></h1></center>
        </div>
    </div>

<div class="container">
<nav class="navbar navbar-default" role="navigation">
        <ul class="nav nav-pills">
            <li><a href="{!!URL::to('/inicio')!!}"  class="glyphicon glyphicon-home">&nbsp;Inicio</a>

            </li>

            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><h class="glyphicon glyphicon-folder-open">&nbsp;Archivos
            <span class="caret"></span></a></h>
            <ul class="dropdown-menu">
                  
                  <li><a href="{!!URL::to('/manuales')!!}" class="glyphicon glyphicon-book">&nbsp;Manuales</a></li>   
                   <li><a href="{!!URL::to('/videos')!!}" class="glyphicon glyphicon-facetime-video">&nbsp;Videos</a></li>
                   <li><a href="{!!URL::to('/manuales')!!}"class="glyphicon glyphicon-paperclip">&nbsp;Archivos Extras</a></li>  
                </ul>
            </li>
            <li class="active"><a href="{!!URL::to('/manuales')!!}" class="glyphicon glyphicon-book">&nbsp;Manuales</a></li>   

            </li>
        

             <li><a href="#"><h class="glyphicon glyphicon-question-sign">&nbsp;Ayuda</a></li>  
        
             <li><!--Buscador de manuales-->
{!! Form::open(['route'=>'manuales.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
<div class="input-group">
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar manual','title'=>'Ingresa el Nombre del Manual a Buscar','required'=>'required','arial-describedby'=>'search'])!!}
  <!--<span  class="input-group-addon" id="search">
  <span  class="glyphicon glyphicon-search" aria-hidden="true"></span>  
  </span>-->
</div>
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Buscar</button>
<!--{!!Form::submit('Buscar',['class'=>'btn btn-default'])!!}-->
{!!Form::close()!!}</li>
             <li><a href="#"data-toggle="modal" data-target="#myModal">
            <h class="glyphicon  glyphicon-user";>&nbsp;Iniciar_Sesión</a></li>
        </li> 
        </ul>               
</nav>

    </div>
<!-- FORMULARIO  -->
{!!Form::model($manual,['route'=> ['manuales.update',$manual->id],'method'=>'PUT','files' => true])!!}
<!--{!!Form::model($manual,['route' => ['manuales.update',$manual->id],'method' => 'PUT','files' => true,])!!}-->


            <div class="alert alert-info">
            <h4 class="modal-title" id="myModalLabel">Actualizar Manual</h4>
          
            </div>  
          </div>
  

@if(Session::has('message2'))
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message2')}}
 </div>
@endif       
    @if(count($errors) >0)
  <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul>
        @foreach($errors->all() as $error)
          <li>{!!$error!!}</li>
        @endforeach
      </ul>
    </div>
@endif      
          <div class="modal-body">


  <div class="form-group">
    {!!Form::label('nombre','Nombre:',['class'=>'col-sm-3 control-label'])!!}
  
    <div class="col-sm-8">  
      {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del manual','title'=>'Nombre del Manual'])!!}
    
    </div>

  </div>
</br> </br> 
  <div class="form-group">
    {!!Form::label('descripcion','Descripcion:',['class'=>'col-sm-3 control-label'])!!}
    <div class="col-sm-8">  
      {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la descripcion del manual','title'=>'Descripcion del manual'])!!}
    </div>
  </div>
 </br> </br>  
 
  <div class="form-group">  
    <center>
      {!!Form::file('archivo1',['class'=>'btn btn-primary','title'=>'archivo'])!!}
      <label>{{$archivo =$manual->nombre.'.'.$manual->extencion}}</label>
    </center> 
    
  </div>

    
<center>
<div class="checkbox">
{!!Form::checkbox('check', 1, $manual->chekent, ['id' => 'check' ,'onchange'=>'javascript:showContent()'])!!}
<b>Anexar complemento extra de manual</b>
</div>
</center>
    
 @if($manual->chekent=='1')   
    <center>    
    <div>
    {!!Form::file('archivo2',['class'=>'btn btn-primary','title'=>'archivo'])!!}
    <label>{{$manual->nombre2}}</label>
    </div>
    </center>
  @else  
  <center>    
    <div id="content" style="display: none;">
    {!!Form::file('archivo2',['class'=>'btn btn-primary','title'=>'archivo'])!!}
    </div>
    </center>
 @endif 


  <div class="modal-footer">
  
  {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  {!!Form::button('Cancelar',['class'=>'btn btn-default','data-dismiss'=>'modal'])!!}

  </div>
  <!--{!!Form::close()!!}-->
  </form>
<!-- Javascript -->
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
<!-- Javascript -->

{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
         


</body>
</html>