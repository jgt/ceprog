<div id="listAct" Style="display:none">
      
       <a href="{{ route('verArchivos')}}" Style="display:none" id="archivosRoute"></a> 
       <a href="{{ route('calificacion')}}" Style="display:none" id="calificacionRoute"></a>
        <a href="{{ route('getentry')}}" id="descargarRoute" class="alert"></a> 
       <a href="{{ route('apoyo')}}" Style="display:none" id="apoyoRoute"></a> 
       <a href="{{ route('material')}}" Style="display:none" id="materialRoute"></a>
        <a href="{{ route('apollo')}}" Style="display:none" id="apolloRoute"></a> 
        <a href="{{ route('planpdf')}}" Style="display:none" id="actPdf"></a>
        <a href="{{ route('deleteActividad')}}" Style="display:none" id="deleteActividad"></a>
        <a href="{{ route('borrarM')}}" Style="display:none" id="borrarM"></a>
        <a href="{{ route('listrubrica')}}" Style="display:none" id="listRubrica"></a>
        <a href="{{ route('showActividad') }}" Style="display:none" id="rbCrt"></a>
         <a href="{{ route('calUnidad') }}" id="calUni" Style="display:none"></a>
         <a href="{{ route('listExamen') }}" id="ltexa" Style="display:none"></a>

      <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Actividades</strong></td>
            <td><strong>Material de apoyo</strong></td>
            <td><strong>Activar/Editar</strong></td>
            <td><strong>Subir Material</strong></td>
            <td><strong>Ver Pdf</strong></td>
            <td><strong>Rubricas</strong></td>
            <td><strong>Crear Rubricas</strong></td>
            <td><strong>Calificar</strong></td>
            <td><strong>Borrar</strong></td>
          </thead> 
          <tbody id="tablaActividad">
            
          </tbody>
       </table>
      </div>
      <a href="#" class="btn btn-warning" id="backActividad">Atras</a>
     </div>