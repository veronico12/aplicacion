<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplicacion web de consulta de manuales</title>
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
    <!-- FORMULARIO  -->
{!!Form::model($manual,['route'=> ['manuales.update',$manual->id],'method'=>'PUT','files' => true])!!}
<!--{!!Form::model($manual,['route' => ['manuales.update',$manual->id],'method' => 'PUT','files' => true,])!!}-->


    <div class="alert alert-info">
    <h4 class="modal-title" id="myModalLabel">Actualizar Manual</h4>
    </div>  
          

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
  <input type="file" name="archivo1">
  <!--{!!Form::file('archivo2',['class'=>'btn btn-primary','title'=>'archivo'])!!}
-->
  </center>
  </div>  
  
  
  
    <center>
    <div class="checkbox">
  
   <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
   <b>Anexar complemento extra de manual</b>
   </div>
   </center>
    
    <center>    
    <div id="content" style="display: none;">
    {!!Form::file('archivo2',['class'=>'btn btn-primary','title'=>'archivo'])!!}
    </div>
    </center>

  <div class="modal-footer">
  
  {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  {!!Form::button('Cancelar',['class'=>'btn btn-default','data-dismiss'=>'modal'])!!}

  </div>
  {!!Form::close()!!}
  
	
</body>
</html>
