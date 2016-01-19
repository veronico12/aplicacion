@extends ('menu_manuales')
@section('contenido_manuales')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span>{{Session::get('message')}}</span>

</div>
@endif


@if(Session::has('message2'))
<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 {{Session::get('message2')}}
 </div>
@endif

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

<div class="container">
	<div class="row">
		<br>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Manuales registrados &nbsp;&nbsp;&nbsp;
					
				</div>

				<table class="table table-bordered table-condensed table-hover">
			<thead>

				<tr class="info">
				        <th>Nombre</th>      
				        <th>video</th>
						<th>Descripción</th>
						<th>Extras</th>
						<th>Actualizar</th>
						<th>Eliminar</th>
				<tr>		
			</thead>
			
				<tbody>
					@foreach($manuales as $manual)
					<tbody>
						<td class="success"><a href="{{$manual->ruta}}" target="_blank">{{$archivo =$manual->nombre}}</a></td>
					

						@if($manual->extencion=="mp4")
				    	<td class="success">
				    		<video src="{{$manual->ruta}}" controls width="250" height="150">
                      		</video>
				    		</td>
				    
				    	@else
				    	<td class="success">
				   
				    	</td>
				    	@endif
						<td class="success">{{$manual->descripcion}}</td>
						<td class="success"><a href="{{$manual->ruta2}}" target="_blank">{{$archivo2 =$manual->nombre2}}</a></td>
						<td  class="warning">{!!link_to_route('manuales.edit', $title = 'Actualizar', $parameters = $manual->id, $attributes = ['class'=>'btn btn-warning'])!!}</td>
						<!--<td><a href="{!!URL::to('/eliminar')!!}"class="label label-danger">Eliminar</a></td>
						
						<a href="#!" class="btn-delete">Eliminar</a></td>
						 class="panel-heading"><a href="javascript:confirmar()"><span class="label label-danger">Eliminar</span></a></a>
						-->
						
						<td class="danger">
						{!!Form::open(['route'=>['manuales.destroy', $manual], 'method' => 'DELETE'])!!}
                        {!!Form::submit('Eliminar',$attributess=['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}
						</td>

						<!--{!!link_to_route('manuales.show', $title = 'Eliminar', $parameters = $manual->id, $attributes = ['class'=>'label label-danger'])!!}
							-->
					</tbody>
					@endforeach
				</tbody>
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

<div class="container">
			<div class="row">
				<div class="col-md-2 col-md-offset-10">
					<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus">Añadir Manual</span></button>
				</div>				
			</div>					
	</div>


<!-- FORMULARIO-->  
{!!Form::open(['route'=>'manuales.store', 'method'=>'POST','files' => true])!!}

<div class="form-horizontal">
<div class="container">
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
					<button type = "button" size="10"class = "close" data-dismiss = "modal" aria-hidden = "true">
                    &times;
                  </button>	
                  <div class="alert alert-info">
						<h4 class="modal-title" id="myModalLabel">Registrar Manual</h4>
					</div>	
					</div>

<!--@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		<ul>
  			@foreach($errors->all() as $error)
  				<li>{!!$error!!}</li>
  			@endforeach
  		</ul>
  	</div>
@endif-->
					<div class="modal-body">					

<div class="form-group">
		{!!Form::label('nombre','Nombre:',['class'=>'col-sm-3 control-label'])!!}
	
		<div class="col-sm-8">	
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del manual','title'=>'Nombre del Manual'])!!}
		
		</div>
	</div>

	<div class="form-group">
		{!!Form::label('descripcion','Descripcion:',['class'=>'col-sm-3 control-label'])!!}
		<div class="col-sm-8">	
			{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la descripcion del manual','title'=>'Descripcion del manual'])!!}
		</div>
	</div>

	<div class="form-group">
	<center>
	
	{!!Form::file('archivo1',['class'=>'btn btn-primary','title'=>'archivo','required'=>'required'])!!}
	<!--{!!Form::file('path',['class'=>'btn btn-primary','title'=>'archivo','required'])!!}
	-->
	</center>
	</div>	
	
	
  	<center>
  	<!--
  	{!!Form::label('Anexar complemento extra de Manual','')!!}
    -->
    <div class="checkbox">
  
  {!!Form::checkbox('check', 1, null, ['id' => 'check' ,'onchange'=>'javascript:showContent()'])!!}
  <b>Anexar complemento extra de manual</b>
   </div>
    </center>
    
<center>    
<!--'required'=>'required'-->
<div id="content" style="display: none;">
   {!!Form::file('archivo2',['class'=>'btn btn-primary','title'=>'archivo'])!!}
 

 </div>
</center>

	<div class="modal-footer">
	
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::button('Cancelar',['class'=>'btn btn-default','data-dismiss'=>'modal'])!!}

	</div>
	{!!Form::close()!!}
</div>
</div>	
</div>
</div>
</div>
</div>
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

<!-- -->

<script language="Javascript"> 
function confirmar(){ 
 confirmar=confirm("¿Esta seguro de que desea eliminar el manual windows7?"); 
 if (confirmar){ 
// si pulsamos en aceptar

alert('Has dicho que si');
}
else {

// si pulsamos en cancelar
alert('Has dicho que no'); }
} 
</script>



{!! Form::open(['route' => ['manuales.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}


<script>
$(document).ready(function () {
    $('.btn-delete').click(function (e) {

        e.preventDefault();

        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();

        row.fadeOut();

        $.post(url, data, function (result) {
            alert(result.message);
        }).fail(function () {
            alert('El usuario no fue eliminado');
            row.show();
        });
    });
});
</script>

{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}

</body>
</html> 			
		
@endsection


