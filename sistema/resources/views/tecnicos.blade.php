<!DOCTYPE html>
<html>
<head>
	<title>Control de cursos FEI</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<meta charset="UTF-8">
</head>
<body>
	<!-- INICIO ENCABEZADO Y MENU -->
	<div class="container">
		<div class="page-header">
			<h1>Control de manuales FEI<small>Técnicos</small></h1>
		</div>
	</div>
	<div class="container">
		<ul class="nav nav-pills">
			<li class="active"><a href="#"  class="glyphicon glyphicon-home">&nbsp;Inicio</a>

			</li>

			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><h class="glyphicon glyphicon-film">&nbsp;Galería
			<span class="caret"></span></a></h>
			<ul class="dropdown-menu">
			      <li><a href="videos" class="glyphicon glyphicon-facetime-video">&nbsp;Videos</a></li>
			      <li><a href="archivos" class="glyphicon glyphicon-folder-open">&nbsp;Archivos</a></li>	
			      

			    </ul>
			</li>
			<li><a href="manuales"  class="glyphicon glyphicon-book">&nbsp;Manuales</a>

			</li>
		

			 <li><a href="#"><h class="glyphicon glyphicon-question-sign">&nbsp;Ayuda</a></li>	
		
			 <li><input type="text" class="form-control" id="name" title="ingrese una busqueda" placeholder="Igrese su Busqueda" required>
			 <li><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Buscar</button></li>
			 
		
				<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><h class="glyphicon  glyphicon-user";>&nbsp;
			      Cuenta<span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu">
			      <li><a href="#">Opción1</a></li>
			      <li class="divider"></li>
			      <li><a href="inicio">Cerrar sesión</a></li>
			    </ul>
			 </li>
		</li> 
		</ul>				


	</div>
	<!-- TABLA DE ALUMNOS REGISTRADOS -->
	<div class="container">
		<div class="row">
			<br>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alumnos registrados</div>
					<table class="table table-bordered table-condensed table-hover">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellido paterno</th>
								<th>Apellido materno</th>
								<th>e-mail</th>
								<th>Estado</th>
							</tr>	
						</thead>				
						<tbody>
							<tr>
								<td><a href="#">Juan Perez</a></td>
								<td>Perez</td>
								<td>Hernández</td>
								<td>juan@perez.com</td>	
								<td>Activo</td>								
							</tr>
							<tr>
								<td><a href="#">Carlos</a></td>
								<td>Ochoa</td>
								<td>Ramirez</td>
								<td>carlos@ochoa.com</td>	
								<td>Activo</td>							
							</tr>
							<tr>
								<td><a href="#">José </a></td>
								<td>Castillo</td>
								<td></td>
								<td>Jose@castillo.com</td>	
								<td>Inactivo</td>							
							</tr>						
						</tbody>				
					</table>							
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-md-offset-10">
					<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Añadir usuario</button>
				</div>				
			</div>					
	</div>
	<!-- VENTANA MODAL USUARIOS_AÑADIR -->
		<div class="container">
			<div class="modal fade" data-keyboard="false" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Añadir Usuario</h4>
						</div>
						<div class="modal-body">							
							<!-- FORMULARIO  -->
							<form class="form-horizontal"role="form">
								<div class="form-group">
									<label for="user" class="col-sm-3 control-label">Nombre</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" placeholder="Nombre">
									</div>										
								</div>
								<div class="form-group">
									<label for="user" class="col-sm-3 control-label">Apellido paterno</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" placeholder="Apellido paterno">
									</div>										
								</div>
								<div class="form-group">
									<label for="user" class="col-sm-3 control-label">Apellido materno</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" placeholder="Apellido materno">
									</div>										
								</div>
								<div class="form-group">
									<label for="user" class="col-sm-2 col-sm-offset-1 control-label">E-Mail</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="user" placeholder="E-Mail">
									</div>										
								</div>								
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Guardar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>			
		</div>	
	<!-- Javascript -->
	<script type="text/javascript" src='{{asset('js/jquery-2.1.0.js')}}'></script>
	<script type="text/javascript" src='{{asset('js/bootstrap.min.js')}}'></script>

</body>
</html>