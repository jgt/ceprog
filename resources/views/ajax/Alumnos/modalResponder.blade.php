<div id="respActalm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <table class="table">
         <thead>
           <div class="form-group">

     {!! Form::open(['route' => 'descarga', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'respAlm', 'files' => true]) !!}

    {!! Form::label('usuario', 'Nombre: ', ['class' => 'form-group']) !!}

  {!! Form::text('usuario', null, ['class' => 'form-control', 'id' => 'userA', 'readonly' => 'readonly']) !!}
  {!! Form::text('user_id', null, ['class' => 'form-control','Style' => 'display:none', 'id' => 'almIdsemana']) !!}
   {!! Form::text('actividad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'act_id']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
   <hr>
   {!! Form::submit('Responder', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'Ralm'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>