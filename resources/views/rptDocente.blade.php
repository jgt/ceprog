
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte Evaluacion Docente</title>
    <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo_10A_FullColor.png">
      </div>
      <h1>Reporte Evaluacion Docente</h1>
      <div id="company" class="clearfix">
        <div>Universidad Ceprog</div>
        <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
        <div>+52 (916) 345 3906 </div>
        <div><a href="#">contacto@uceprog.edu.mx</a></div>
      </div>
      <div id="project">
        <div><span>Materia:</span>{{$materia->name}}</div>
        <div><span>Carrera:</span>{{$materia->semestre->carrera->name}}</div>
        <div><span>Semetre:</span>{{$materia->semestre->name}}</div>
        <div><span>Catedratico:</span>
        @foreach($materia->users as $user)
          {{$user->name}},
        @endforeach
        </div>
        <div><span>Fecha</span>{{$fecha}}</div>
        <div><span>Alumnos Evaluados:</span>{{count($materia->resultados)}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
        <?php $sum =0;?>
           @foreach($rangos as $rango)
           <tr>
                <td>{{$rango->name}}</td>
                <td>Resultado</td>
                <td>Porcentaje</td>
           </tr>
        </thead>
        <tbody>
          <tr>
          <?php $total =0;?>
            @foreach($materia->semestre->users as $user)
              @foreach($user->respuestasDocentesUser as $respuesta)
                  @if($respuesta->preguntaDocente->rango_id == $rango->id && $respuesta->materia_id == $materia->id)
                  <?php $total += $respuesta->posibleRespuesta->valor;?>
                  @endif
              @endforeach
            @endforeach
            <td></td>
            <td>{{$total}}</td>
            <?php $sum +=$total; ?>
            <td>{{number_format($total/count($materia->resultados),1)}}</td>
          </tr>
        </tbody>
         @endforeach
      </table>
      <h3>Resultado Total: {{number_format($sum/count($materia->resultados),1)}}%</h3>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Este formato es un reporte de la Evaluacion Docente.</div>
      </div>
    </main>
    <footer>
      Universidad ceprog Construimos tu futuro.
    </footer>
  </body>
</html>