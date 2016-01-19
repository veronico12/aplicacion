<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplicacion web de consulta de manuales</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('imagenes/tecnicos.ico')}}" />
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
            <li><a href="inicio"  class="glyphicon glyphicon-home">&nbsp;Inicio</a>

            </li>

            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><h class="glyphicon glyphicon-folder-open">&nbsp;Archivos
            <span class="caret"></span></a></h>
            <ul class="dropdown-menu">
                  
                  <li><a href="manuales" class="glyphicon glyphicon-book">&nbsp;Manuales</a></li>   
                   <li class="divider"></li>
                   <li><a href="videos" class="glyphicon glyphicon-facetime-video">&nbsp;Videos</a></li>
                   <li class="divider"></li>
                   <li><a href="archivos" class="glyphicon glyphicon-paperclip">&nbsp;Archivos Extras</a></li>  
                
                </ul>
            </li>
            <li class="active"><a href="archivos" class="glyphicon glyphicon-paperclip">&nbsp;Extras</a></li>  
        

             <li><a href="#"><h class="glyphicon glyphicon-question-sign">&nbsp;Ayuda</a></li>  
              <li>
{!! Form::open(['route'=>'manuales.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
<div class="input-group">
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar manual','title'=>'Ingresa el Nombre del Manual a Buscar','required'=>'required','arial-describedby'=>'search'])!!}
</div>
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Buscar</button>
{!!Form::close()!!}</li>
            
             <li><a href="#"data-toggle="modal" data-target="#myModal">
            <h class="glyphicon  glyphicon-user";>&nbsp;Iniciar_Sesión</a></li>
             </li> 
        </ul>               
</nav>

    </div>

@yield('contenido_archivos')

</body>
</html>