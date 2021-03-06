<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Reporte General {{ $campo->nombre }}</title>
            <link rel="stylesheet" href="{{'estiloPdf/css/pdfDocente.css'}}" media="all" />
        </head>
        <body>
        <header class="clearfix">
            <div id="logo">
                <img src="img/logo_10A_FullColor.png">
            </div>
            <h1>Reporte General {{ $campo->nombre }}</h1>
            <div id="company" class="clearfix">
                <div>Universidad Ceprog</div>
                <div>Carretera Palenque - Catazajá Km <br /> 26+500 a un costado del Aeropuerto </div>
                <div>+52 (916) 345 3906 </div>
                <div><a href="#">contacto@uceprog.edu.mx</a></div>
                <div><strong>Total de alumnos por materia: </strong>{{ $alumnos }}</div>
                <div><strong>Total de alumnos encuestado: </strong>{{ $almCampus }}</div>
            </div>
            
        </header>
        @foreach($materias as $materia)

                <h3>Programa academico: {{ $materia->semestre->carrera->name }}</h3>

                <ul style="list-style:none;">
                    @foreach($materia->users as $maestro)
                    <li>Materia: <strong>{{ $materia->name }}</strong> - Semestre: <strong>{{ $materia->semestre->name }}</strong> - Maestro: <strong>{{ $maestro->name }}</strong></li>

                    @endforeach
                    <li>
                        <ul>
                            @foreach($materia->semestre->users as $user)

                                @foreach($user->resultadoDocenteUser as $resul)

                                    @if($resul->materia_id == $materia->id && $user->id == $resul->user_id)

                                        <li>{{ $user->name }}</li>       

                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                </ul>
            
        @endforeach
<footer>
Universidad ceprog Construimos tu futuro.
</footer>
</body>
</html>