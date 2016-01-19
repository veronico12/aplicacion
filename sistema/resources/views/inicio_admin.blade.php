<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aplicacion web de consulta de manuales</title>
   <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	{!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
</head>

<body>
<div class="container">
		<div class="page-header">
			<center><h1>Control de manuales<small>Administrador</small></h1></center>
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
			       <li><a href="videos" class="glyphicon glyphicon-facetime-video">&nbsp;Videos</a></li>
			       <li><a href="archivos" class="glyphicon glyphicon-paperclip">&nbsp;Archivos Extras</a></li>	
			    </ul>
			</li>
			</li>
		

			 <li><a href="#"><h class="glyphicon glyphicon-question-sign">&nbsp;Ayuda</a></li>	
		
			 <li><input type="text" class="form-control" id="name" title="ingrese una busqueda" placeholder="Igrese su Busqueda" required>
			 <li><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Buscar</button></li>
			 <li><a href="#"data-toggle="modal" data-target="#myModal">
			<h class="glyphicon  glyphicon-user";>&nbsp;Iniciar_Sesión</a></li>
		</li> 
		</ul>				
</nav>

	</div>



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
{!!Form::open(['class'=>'form-horizontal'],['route'=>'manuales.store', 'method'=>'POST','files' => true])!!}
	<div class="container">
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
					<button type = "button" size="10"class = "close" data-dismiss = "modal" aria-hidden = "true">
                    &times;
                  </button>	
						<h4 class="modal-title" id="myModalLabel">Registrarse como administrador</h4>
					</div>
					<div class="modal-body">
						<!-- FORMULARIO  -->
						<form class="form-horizontal"role="form">
						<div class="form-group">
                         <label for="user" class="col-sm-3 control-label">Usuario:</label>
								<div class="col-sm-8">
								<span  class= "glyphicon glyphicon-user"  id= "basic-addon1" >
								<input type="text"  id="name" title="Usuario" placeholder="Usuario" required>
								
								</div>
							</div>
										
						<div class="form-group">
								<label for="user" class="col-sm-3 control-label">Contraseña:</label>
								<div class="col-sm-8">
								<span  class= "glyphicon glyphicon-lock"  id= "basic-addon1" >
									<input type="password"  id="name" title="Contraseña" placeholder="Contraseña" required>
								</div>
							</div>
		


						</form>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Entrar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<footer>
	
</footer>
<--!-->

{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		
		<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa su Nombre '])!!}
	</div>

<div class="form-group">
		{!!Form::label('email','Correo:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
	
<div class="form-group">
		{!!Form::label('password','Contraseña:')!!}
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa Su Contraseña'])!!}
</div>
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}

</body>

</html>
