<div id="listExamenDoc" Style="display:none">
      
        <a href="{{ route('listaPreguntasDocente')}}" Style="display:none" id="listPregDocente"></a>
        <a href="{{ route('borrarExamenDocente') }}" Style="display:none" id="borrarExamenDocente"></a>
        <a href="{{ route('alumnoReportePdf') }}" Style="display:none" id="alumnoReportePdf"></a>
        <div class="table-responsive">
       <table class="table">
          <thead>
            <td><strong>Nombre</strong></td>
            <td><strong>Responder</strong></td>
            <td><strong>Fecha de inicio</strong></td>
            <td><strong>Fecha de vencimiento</strong></td>
          </thead> 
          <tbody id="tablaExamenesDoc"></tbody>
       </table>
    </div>
     </div>