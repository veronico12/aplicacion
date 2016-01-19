<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aplicacion web de consulta de manuales</title>

	<link rel="shortcut icon" type="image/x-icon" href="{{asset('imagenes/tecnicos.ico')}}" />
    {!!Html::style('css/bootstrap.css')!!}
    {!! Html::style('assets/smoke-v3/css/smoke.css') !!}
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
			<li class="active"><a href="inicio"  class="glyphicon glyphicon-home">&nbsp;Inicio</a>

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
{!!Form::close()!!}
</li>
			 <li><a href="#"data-toggle="modal" data-target="#myModal">
			<h class="glyphicon  glyphicon-user";>&nbsp;Iniciar_Sesión</a></li>
		</li> 
		</ul>				
</nav>

	</div>

<!--->
<!- -->
@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message-error')}}
</div>
@endif

<!-  -->

@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		<ul>
  			@foreach($errors->all() as $error)
  				<li>{!!$error!!}</li>
  			@endforeach
  		</ul>
  	</div>
@endif

<!-- FIN ENCABEZADO Y MENU -->
	<br>
	<div class="container">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <p class="lead">Bienvenido al panel de control de consulta de manuales de Facultad de Estadística e Informática</p>
		    <p class="lead">Actualmente hay dos <b>2</b> manuales activos</p>
		  </div>
		</div>
	</div>
	<!-- Javascript -->
<!-- VENTANA MODAL USUARIOS_AÑADIR -->
<!-- VENTANA MODAL USUARIOS_AÑADIR -->

{!!Form::open(['class'=>'form-horizontal','route'=>'log.store', 'method'=>'POST'])!!}
<!--{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}-->

	<div class="container">
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
					<button type = "button" size="10"class = "close" data-dismiss = "modal" aria-hidden = "true">
                    &times;
                  </button>	
                  <div class="alert alert-info">
						<h4 class="modal-title" id="myModalLabel">Registrarse Como Administrador</h4>
				   </div>		
					</div>
					<div class="modal-body">
						<!-- FORMULARIO  -->
						<form class="form-horizontal"role="form">

						<div class="form-group">
                         {!!Form::label('usuario','Usuario:',['class'=>'col-sm-3 control-label'])!!}
						 	<div class="col-sm-8">
						  {!!Form::text('usuario',null,['class'=>'form-control','data-smk-msg'=>'Required field','placeholder'=>'Ingresa tu Nombre de usuario','title'=>' Usuario','required'])!!}
						
								</div>
							</div>
								
						
         				<div class="form-group">							
						{!!Form::label('password','Password:',['class'=>'col-sm-3 control-label'])!!}	
						<div class="col-sm-8">
						{!!Form::password('password',['class'=>'form-control','alt'=>'strongPass', 'placeholder'=>'Ingresa tu contraseña','title'=>'Contraseña','required'])!!}		
						</div>
						</div>

						</form>
					</div>
					<div class="modal-footer">
					{!!Form::submit('Entrar',['class'=>'btn btn-primary'])!!}
					{!!Form::button('Cancelar',['class'=>'btn btn-default','data-dismiss'=>'modal'])!!}	
					</div>
				</div>
			</div>
		</div>
	</div>
{!!Form::close()!!}

<!-- fin de ventana modal -->

{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('assets/smoke-v3/js/smoke.js') !!}
{!! Html::script('assets/smoke-v3/lang/es.js') !!}

</body>

</html>
