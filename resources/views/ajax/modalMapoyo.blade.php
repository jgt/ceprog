<div id="Mapoyo" class="modal fade" role="dialog">
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

     {!! Form::open(['route' => 'material', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'apoyoM_id', 'files' => true]) !!}

      {!! Form::label('Docente', 'Docente: ',['class' => 'form-group']) !!}
     {!! Form::text('Authuser', null, ['class' => 'form-control', 'id' => 'AuthUserApoyo', 'readonly' => 'readonly']) !!}
   {!! Form::text('actividad_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'apoyo_id']) !!}
   {!! Form::text('user_id', null, ['class' => 'form-control', 'Style' => 'display:none', 'id' => 'userApoyo_id']) !!}
    </div>
  
   <div class="form-group">
   {!! Form::label('archivo', 'Archivo adjunto: ', ['class' => 'form-group']) !!}

   {!! Form::file('archivo', null, ['class' => 'form-control'])!!}
   <hr>
  {!! Form::submit('Subir material', ['class' => 'btn btn-sm btn btn-info upload', 'id' => 'apoy'])!!}
   </div>

        </div>
     
   {!! Form::close() !!}
  
         </thead>
       </table>
      </div>
    </div>

  </div>
</div>