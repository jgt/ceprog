<div id="crtRubrica" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rubricas</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'storeRubrica', 'method' => 'POST', 'class' => 'form-group', 'id' => 'formRu']) !!}


  <div class="form-group">
  {!! Form::label('name', 'Nombre de la rubrica ', ['class' => 'form-group']) !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'actRub']) !!}
   <strong class="val" id="nombre"></strong>
   </div>

  <div class="form-group">
  {!! Form::label('descripcion', 'Descripcion ', ['class' => 'form-group']) !!}
   {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'actDesc']) !!}
   <strong class="val" id="descripcion"></strong>
  </div>
  
  <div class="form-group">
  {!! Form::label('actividadN', 'Nombre de la actividad  ', ['class' => 'form-group']) !!}
   {!! Form::text('actividadN', null, ['class' => 'form-control', 'id' => 'actN', 'readonly' => 'readonly']) !!}
   {!! Form::text('actividad_id', null, [ 'style' => 'display:none', 'id' => 'acId'])!!}
  </div>

   <div class="form-group">
  {!! Form::label('porcentaje', 'Porcentaje de la actividad ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'actPr', 'readonly' => 'readonly']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('porcentajeD', 'Porcentaje disponible ', ['class' => 'form-group']) !!}
   {!! Form::text('porcentajeD', null, ['class' => 'form-control', 'id' => 'actD', 'readonly' => 'readonly']) !!}
  </div>

  <div class="form-group">
  {!! Form::label('total', 'Porcentaje  ', ['class' => 'form-group']) !!}
   {!! Form::text('total', null, ['class' => 'form-control', 'id' => 'actTotal']) !!}
   <strong class="val" id="prcT"></strong>
  </div>
  
  {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary"  id="crtR">Crear</a>
      </div>
    </div>

  </div>
</div>