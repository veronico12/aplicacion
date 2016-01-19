@extends ('menu_archivos')
@section('contenido_archivos')
<!-- FIN ENCABEZADO Y MENU -->
	<!-- TABLA DE ALUMNOS REGISTRADOS -->
<div class="container">
	<div class="row">
		<br>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Archivos Extras Registrados &nbsp;&nbsp;&nbsp;
					
				</div>

				<table class="table table-bordered table-condensed table-hover">
					<thead>
					<tr class= "info">
						<th>Nombre</th>
						<th>video</th>
						<th>Descripción</th>
						<th>Extras</th>
						<th>Actualizar</th>
						<th>Eliminar</th>
						
					</tr>
					</thead>

					@foreach($manuales as $manual)
					<tbody>
					@if($manual->extencion2=="zip" or $manual->extencion2=="rar" or $manual->extencion2=="bat")
					<td><a target="_blank" href="{{$manual->ruta}}">{{$archivo =$manual->nombre}}</a></td>
				    @if($manual->extencion=="mp4")
				    	<td>
				    		<video src="{{$manual->ruta}}" controls width="250" height="150">
                      		</video>
				    		</td>
				    
				    	@else
				    	<td>
				   
				    	</td>
				    	@endif
				    <td>{{$manual->descripcion}}</td>
				    <td><a href="{{$manual->ruta2}}" target="_blank">{{$archivo2 =$manual->nombre2}}</a></td>
				    
				    <td>{!!link_to_route('manuales.edit', $title = 'Actualizar', $parameters = $manual->id, $attributes = ['class'=>'btn btn-warning'])!!}</td>
				
				    <td>{!!Form::open(['route'=>['manuales.destroy', $manual], 'method' => 'DELETE'])!!}
			            {!!Form::submit('Eliminar',$attributess=['class'=>'btn btn-danger'])!!}
		                {!!Form::close()!!}</td>
				   	
				    <!--<td class="panel-heading"><a href="javascript:confirmar()"><span class="label label-danger">Eliminar</span></a></a></td>!-->
				    @endif
					</tbody>
					@endforeach
				  
				</table>
				</div>
				<div>
				<center>
					{!!$manuales->render()!!}
				</center>
				</div>
				
		</div>
	</div>
</div>
		
{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
</body>
</html>
@endsection