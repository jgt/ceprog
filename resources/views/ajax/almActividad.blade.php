<div id="Almact" class="col-md-10 col-md-offset-1" Style="display:none">
        
        <a href="{{ Auth::user()}}" id="AuthUser" Style="display:none"></a>
        <a href="{{ route('pdf')}}" id="pdfAct" Style="display:none"></a>
        <a href="{{ route('fileentry')}}" id="fileentry" Style="display:none"></a>
        <a href="{{ route('borrar')}}" id="borrarA" Style="display:none"></a>
        <a href="{{ route('material')}}" id="materialAlm" Style="display:none"></a>
        <a href="" id="a" Style="display:none"></a>
      <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Actividad</strong></td>
            <td><strong>Responder actividad</strong></td>
            <td><strong>Material de Apoyo</strong></td>
            <td><strong>Ver actividad</strong></td>
            <td><strong>Archivos enviados</strong></td>
            <td><strong>Fecha de inicio</strong></td>
            <td><strong>Fecha limite</strong></td>
          </thead> 
          <tbody id="tablaAlmact">
            
          </tbody>
       </table>
      </div>
     </div>