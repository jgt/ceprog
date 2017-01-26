@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
 
 @include('ajax.modalUnidad')
 @include('ajax.modalRespuestas')
 @include('ajax.Subtemas.modalEditsubtemas')
 @include('ajax.Subtemas.modalImagen')
 @include('ajax.Subtemas.modalListImagenes') 
 @include('ajax.Rubricas.modalRubricas')
 @include('ajax.modalArchivos')
 @include('ajax.Material.modalMaterial')
 @include('ajax.modalMapoyo')
 @include('ajax.modalEditRubricas')
 @include('ajax.modalListVideos')
 @include('ajax.Videos.modalListVideoDocente')
 @include('ajax.modalActUser')
 @include('ajax.modalListVideos')
 @include('ajax.modalMapoyoAlm')
 @include('ajax.modalResponder')
 @include('ajax.modalFile')
 @include('ajax.modalTutoPrf')
 @include('ajax.modalTutorialAlm')
 @include('ajax.modalTutorial')
 @include('ajax.modalPlan')
 @include('ajax.modalPlanMateria')
 @include('ajax.modalShowUser')
 @include('ajax.modalUpdateUser')
 @include('ajax.Carreras.modalPlan')
 @include('ajax.Carreras.modalPlanMateria')
 @include('ajax.Carreras.modalEditPlan')
 @include('ajax.Usuarios.modalEditUser')
 @include('ajax.modalQuiz')
 @include('ajax.modalNotaExamen')
 @include('ajax.modalEditarExamen')
 @include('ajax.modalEditPregunta')
 @include('ajax.modalEditRespuesta')
 @include('ajax.modalPreguntas')
 @include('ajax.modalRespuestasIncompletas')
 @include('ajax.Semestres.modalEditSemestre')
 @include('ajax.Materias.modalEditMateria')
 @include('ajax.modalCrtRubricas')
 @include('ajax.Calificaciones.modalUserNota')
 @include('ajax.ExamenDocente.modalRespuestas')
 @include('ajax.ExamenDocente.modalQuizDocente')
 @include('ajax.ExamenDocente.modalEditexamenDocente')
 @include('ajax.ExamenDocente.modalCreateRespuestas')
 @include('ajax.ExamenDocente.editarPreguntas.modalEditarPreguntaDocente')
 @include('ajax.ExamenDocente.modalDosOpciones')
 @include('ajax.Semestres.modalEditAlumnos')
 @include('ajax.Recursos.recurso')
 @include('ajax.Recursos.videoRecurso')
 @include('ajax.Recursos.modalDescripcion')
 @include('ajax.Recursos.modalEditarRecurso')
 @include('ajax.Recursos.modalDescripcionMaestro')
 @include('ajax.Recursos.modalVideoMaestro')
 @include('ajax.Planeacion.createPlaneacion')
 @include('ajax.Planeacion.modalDeletePlc')
 @include('ajax.Actividad.deleteActividad')
 @include('ajax.Rubricas.modalDelete')

<div class="container">

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
					
					
					@include('ajax.Unidades.editUnidad')
					@include('ajax.Actividad.listActividad')
					@include('ajax.Calificaciones.crearCalificacion')
					@include('ajax.Actividad.editar')
					@include('ajax.Subtemas.listSubtemas')
					@include('ajax.Videos.modalVideos')
					@include('ajax.Actividad.crearActividad')
					@include('ajax.Subtemas.modalCrearSubtema')
					@include('ajax.Unidades.Unidades')
					@include('ajax.Planeacion.listPlaneacionAlm')
					@include('ajax.Planeacion.listPlanAdm')
					@include('ajax.Planeacion.listPlaneacion')
					@include('ajax.Unidades.planeacion')
					@include('ajax.Recursos.listRecursosMaestro')
					@include('ajax.Recursos.listRecurso')
					@include('ajax.ExamenDocente.reportes.tablaMaterias')
					@include('ajax.ExamenDocente.listPreguntas')
					@include('ajax.ExamenDocente.editPreguntaDocente')
					@include('ajax.ExamenDocente.listExamenAdmin')
					@include('ajax.ExamenDocente.listaExamenDocente')
					@include('ajax.ExamenDocente.crearPreguntaDocente')
					@include('ajax.ExamenDocente.crearExamenDocente')
					@include('ajax.Materias.listMaterias')
					@include('ajax.Semestres.listSemestres')
					@include('ajax.Semestres.listAlumnos')
					@include('ajax.subirTutorial')
					@include('ajax.admPlan')
					@include('ajax.crearPregunta')
					@include('ajax.crearExamen')
					@include('ajax.listaAlumnosUser')
					@include('ajax.listaUser')
					@include('ajax.listPrfTuto')
					@include('ajax.almActividad')
					@include('ajax.alumnosListUnidad')
					@include('ajax.crearUsuario')
					@include('ajax.listTutorial')
					@include('ajax.listTutorialAlm')
					@include('ajax.listaExamenes')
					@include('ajax.admListaPersonal')
					@include('ajax.VunidadEstudiante')
					@include('ajax.listaExamenesMaestros')
					@include('ajax.listaPreguntas')
					@include('ajax.chatCeprog')
					@include('ajax.admForo')
					@include('ajax.Carreras.ajaxListCarreras')
					@include('ajax.admRole')
					@include('ajax.listForoadm')
					@include('ajax.vizualizacionUnidad')
					@include('ajax.notasRubricas')

		</div>
	</div>
</div>

@endsection



