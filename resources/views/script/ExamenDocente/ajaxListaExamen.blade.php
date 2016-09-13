<script>
	
	$(document).on('ready', function(){

		$('a#Rexamen').on('click', function(e){

			e.preventDefault();

		$('#crtExamenDocente').hide();
        $('#mtaList').hide();
        $('#crr').hide();
        $('#semm').hide();
        $('#listTutAlm').hide();
        $('#preForo').hide();
        $('#froadm').hide();
        $('#chatForo').hide();
        $('div#act').hide();
        $('div#listAct').hide();
        $('div#examen').hide();
        $('div#listExamen').hide();
        $('div#calAct').hide();
        $('div#planeacionC').hide();
        $('div#listSubtemas').hide();
        $('#createVideos').hide();
        $('div#listAct').hide();
        $('#Almact').hide();
        $('div#vizuaUnidad').hide();
        $('div#AlmUni').hide();
        $('div#VunidadE').hide();
        $('div#calAct').hide();
        $('div#notasRubricas').hide();
        $('#listRub').hide();
        $('#listTutAlm').hide();
        $('#adminPlan').hide();
        $('#admRole').hide();
        $('div#user').hide();
        $('#admForo').hide();
        $('#listTut').hide();
        $('div#listUnidades').hide();
        $('#listPersonal').hide();
        $('#prflistTuto').hide();
        $('#crr').hide();
        $('#alumnosListUser').hide();
        $('#listExamenDocente').hide();
        $('#listPreg').hide();
		$('#listExamenDoc').show();
			var route = $(this).attr('href');
			var tablaExamen = $('#tablaExamenesDoc');

			$.get(route, function(resp){

				tablaExamen.html(" ");

				$(resp).each(function(key, value){

					var now = new Date();
		            var startDate = new Date(value.fecha);
		            var endDate = new Date(value.fechaF);

		            if(now >= startDate &&  now <= endDate)
		            {
		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-success' id='Exdoc' value="+value.id+" OnClick='examenDocente(this);' data-toggle='modal' data-target='#quizDocente'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");
		            }else{

		            	tablaExamen.append("<tr><td>"+value.name+"</td><td><button class='btn btn-danger'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

		            }

					

				});

			});
			

		});

		$('#nextQuizDocente').on('click', function(e){

			e.preventDefault();

			var id = $('#exaDocId').val();
			var form = $('#formQuizDocente');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bid%7D').join(id);


			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	var link = $('#listPregDocente').attr('href');
	            	var route = link.split('%7Bid%7D').join(id);
	            	var pregunta = $('#pregQuizDocente');
					var respuesta = $('#quizRespDocente');

					$.get(route, function(resp){

						pregunta.html(" ");
          				respuesta.html(" ");

          				var resultado = $('#resulDocente').val(resp.nota);
						
						if(resp.pregunta.length == 0)
			          	{
			          		alertify.alert("Gracias por tu opinión.");
			            	$('#nextQuizDocente').hide();
                  			$('#endQuizDocente').show();
			            	
			          	}else{

				          		$(resp).each(function(key, value){

								$(value.pregunta).each(function(key, preg){

									preguntaId = $('#pregIdDocente').val(preg.id);
									pregunta.append("<li>"+preg.contador+"<p>"+preg.contenido+"</p></li>");

									$(preg.respuestas_docentes).each(function(key, respu){
									
										respuesta.append("<li><input type='radio' name='posible_respuesta_id' value="+respu.id+">"+respu.name+"</li>");
									
									});
								});

							});
			          	}
					});


	            },

	            error:function(error, $request){

	            	 if(error)
              		{
                		alertify.alert("Recuerda que tienes que responder la pregunta.");
              		}

	            }

			});


		});

		$('#endQuizDocente').on('click', function(e){

			e.preventDefault();

			var form = $('#exFormDocente');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	alertify.alert('El quiz ha terminado gracias por tu tiempo.');
	            	$('#quizDocente').modal('hide');

	            },

	            error:function(error, request){

	            	if(error)
              		{
                		alertify.alert("Error al procesar la solicitud.");
              		}
	            }

			});

		});

		$('#docenteListexa').on('click', function(e){

			e.preventDefault();

			var route = $('#docenteListexa').attr('href');
			var listaExamenes = $('#tablaExamenesAdm');
			$('#listExamenAdmin').show();

			$.get(route, function(resp){

				listaExamenes.html(" ");

				$(resp).each(function(key, value){

					listaExamenes.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editExamenDocente(this);' data-toggle='modal' data-target='#edtExmDoc'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='createPreguntadDocente(this);'><i class='fa fa-database' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='listPreguntaDocente(this);'><i class='fa fa-book' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='pdfDocente(this);'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExaDocente(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

				});

			});

		});

		$('#updateExaDocente').on('click', function(e){

			e.preventDefault();

			var id = $('#editExamDoc').val();
			var form = $('#form-exaDocente');
			var link = form.attr('action')
			var metodo = form.attr('method');
			var route = link.split('%7BexamenDocente%7D').join(id);
			
			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	alertify.alert("El examen ha sido editado");
	            	var route = $('#docenteListexa').attr('href');
					var listaExamenes = $('#tablaExamenesAdm');

					$.get(route, function(resp){

						listaExamenes.html(" ");

						$(resp).each(function(key, value){

							listaExamenes.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editExamenDocente(this);' data-toggle='modal' data-target='#edtExmDoc'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='createPreguntadDocente(this);'><i class='fa fa-database' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='listPreguntaDocente(this);'><i class='fa fa-book' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExaDocente(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

						});

			});
	            },

	            error:function(error, request){

	            	if(error)
	            	{
	            		alertify.alert("Error al procesar la solicitud.");
	            	}

	            }

			});

		});

		$('#pregDocenteEdit').on('click', function(e){

			e.preventDefault();

			var form = $('#formPregDocenteEdit');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp){

	            	alertify.alert("La pregunta ha sido creada correctamente.");
	            	$('#contenidoCreate').val(" ");
	            	$('#mdlEditPreguntaDoc').modal('hide');
	            	$('#docentePreguntaOut').val(resp.id);
	            	$('#modalCreateRespuestasDocente').modal('show');

	            	$('#npDocenteEdit').val(resp.contador);
					var numeroPreguntas = $('#npDocenteEdit').val();
					var contador = 1;
					var sum = parseFloat(numeroPreguntas) + parseFloat(contador);
					$('#contadorDocenteEdit').val(sum);

	            },

	            error:function(request, error)
	            {
	            	if(error)
	            	{
	            		alertify.alert("Error al procesar la solicitud.");
	            	}
	            }


			});

		});

		$('#backList').on('click', function(e){

			e.preventDefault();
			$('#listExamenAdmin').show();
			$('#mdlEditPreguntaDoc').hide();

		});

		$('#backListPreg').on('click', function(e){

			e.preventDefault();
			$('#listExamenAdmin').show();
			$('#listExaPregDocente').hide();

		});

		$('#createRespdocenteOut').on('click', function(e){

			e.preventDefault();

			var form = $('#form-resp-create');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp)
	            {
	            	alertify.alert("Las respuestas han sido creadas correctamente.");
	            	$('#modalCreateRespuestasDocente').modal('hide');
	            },

	            error:function(request, error)
	            {
	            	if(error)
	            	{
	            		alertify.alert("Error al procesar la solicitud.");
	            	}

	            }

			});

		});

		$('#edtPrgDoc').on('click', function(e){

			e.preventDefault();
			var id = $('#actIdpreg').val();
			var form = $('#act-form-Preg');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bid%7D').join(id);

			$.ajax({

				url: route,
	            headers: { 'X-CSFR-TOKEN': token},
	            type: metodo,
	            data: form.serialize(),

	            success:function(resp)
	            {
	            	alertify.alert("La pregunta ha sido editada correctamente.");
	            	var id = resp.examen_docente_id;
	            	var link = $('#lstDocPreg').attr('href');
	            	var route = link.split('%7BexamenDocente%7D').join(id);
	            	var pregunta = $('#tblPregDocente');
		
					$.get(route, function(resp){

						pregunta.html(" ");

						$(resp).each(function(key, value){

							$(value.preguntas).each(function(key, preg){

								pregunta.append("<tr><td>"+preg.contenido+"</td><td><button class='btn btn-primary' value="+preg.id+" OnClick='editPreg(this);' data-toggle='modal' data-target='#'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+preg.id+" OnClick='borrarPreg(this);'><i class='fa fa-pencil-square-o'></i></td></tr>");

							});
						});
					});


	            },

	            error:function(request, error)
	            {
	            	if(error)
	            	{
	            		alertify.alert("Error al procesar la solicitud.");
	            	}

	            }

			});

		});

		$('#listaEPD').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').show();

			var route = $('#lmdExamen').attr('href');
			var tablaExamen = $('#tbListMateriaDoc');

			$.get(route, function(resp){

				tablaExamen.html(" ");

				$(resp).each(function(key, value){

					$(value.semestre.carrera).each(function(key, carrera){

						tablaExamen.append("<tr><td>"+carrera.name+"</td><td>"+value.semestre.name+"</td><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='resporteDocente(this);'><i class='fa fa-pencil-square-o'></i></td></tr>");

					});

				});

			});

		});

	});

	function resporteDocente(btn)
	{
		var id = btn.value;
		var link = $('#rptDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}

	function pdfDocente(btn)
	{
		var id = btn.value;
		var link = $('#exmDocPdf').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		window.open(route);
	}
	
	//administracion de examenes para evaluar el maestro
	function editExamenDocente(btn)
	{
		var id = btn.value;
		var link = $('#editdocenteExa').attr('href');
		var route = link.split('%7BexamenDocente%7D').join(id);
		var materias = $('#selectMatdocenteEdit');

		$.get(route, function(resp){
			
			$(resp.materias).each(function(key, mate){

				materias.append("<option value="+mate.id+">"+mate.name+"</option>");
			});

			$(resp.examen).each(function(key, value){

			$('#editExamDoc').val(value.id);
			$('#edtnamExamen').val(value.name);
			$('#ciueditExam').val(value.ciudad);
			$('#editmodalidadExa').val(value.modalidad);
			$('#editmoduloExa').val(value.modulo);
			$('#editfechaExa').val(value.fecha);
			$('#editfechafExa').val(value.fechaF);

			$(value.materias).each(function(key, mat){

				materias.find("option[value="+mat.id+"]").remove();
				materias.append("<option selected value="+mat.id+">"+mat.name+"</option>");
			});

			});

			
		});
	}

	function createPreguntadDocente(btn)
	{
		var id = btn.value;
		var link = $('#uptPregDoc').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var examenId = $('#exaDocenteIdEdit').val(id);
		$('#listExamenAdmin').hide();
		$('#mdlEditPreguntaDoc').show();

		$.get(route, function(resp){

			$(resp.numeroPreguntas).each(function(key, value){

				$(value.preguntas).each(function(key, preg){

					$('#npDocenteEdit').val(preg.contador);
					var numeroPreguntas = $('#npDocenteEdit').val();
					var contador = 1;
					var sum = parseFloat(numeroPreguntas) + parseFloat(contador);
					$('#contadorDocenteEdit').val(sum);

				});

			});

			$(resp.rangos).each(function(key, rango){

				$('#rangoEditId').append("<option value="+rango.id+">"+rango.name+"</option>");

			});
		});
	
	}

	function listPreguntaDocente(btn)
	{	
		$('#listExaPregDocente').show();
		$('#listExamenAdmin').hide();
		var id = btn.value;
		var link = $('#lstDocPreg').attr('href');
		var examenId = $('#dltIdpreg').attr('href', id);
		var route = link.split('%7BexamenDocente%7D').join(id);
		var pregunta = $('#tblPregDocente');
		
		$.get(route, function(resp){

			pregunta.html(" ");

			$(resp).each(function(key, value){

				$(value.preguntas).each(function(key, preg){

					pregunta.append("<tr><td>"+preg.contenido+"</td><td><button class='btn btn-primary' value="+preg.id+" OnClick='editPreg(this);' data-toggle='modal' data-target='#'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+preg.id+" OnClick='borrarPreg(this);'><i class='fa fa-pencil-square-o'></i></td></tr>");

				});
			});
		});
		

	}

	function editPreg(btn)
	{	
		$('#udpPregDocente').modal('show');
		var id = btn.value;
		var link = $('#preguntaLts').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var rango = $('#edtRango');

		$.get(route, function(resp){

			rango.html(" ");
		
			$(resp).each(function(key, value){

				$('#edtC').val(value.contador);
				$('#edtCont').val(value.contenido);
				$('#edtExaID').val(value.examen_docente_id);
				$('#actIdpreg').val(value.id);

				rango.append("<option value="+value.rango.id+">"+value.rango.name+"</option>");

			});

		});
		

	}

	function borrarPreg(btn)
	{
		var id = btn.value;
		var idExamen = $('#dltIdpreg').attr('href');
		var link = $('#deletePregDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		//lista de preguntas
		var enlace = $('#lstDocPreg').attr('href');
		var ruta = enlace.split('%7BexamenDocente%7D').join(idExamen);
		var pregunta = $('#tblPregDocente');
		
		$.get(route, function(resp){

			$.get(ruta, function(resp){

			pregunta.html(" ");

			$(resp).each(function(key, value){

				$(value.preguntas).each(function(key, preg){

					pregunta.append("<tr><td>"+preg.contenido+"</td><td><button class='btn btn-primary' value="+preg.id+" OnClick='editPreg(this);' data-toggle='modal' data-target='#'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+preg.id+" OnClick='borrarPreg(this);'><i class='fa fa-pencil-square-o'></i></td></tr>");

				});
			});
		});
			

			alertify.alert('La pregunta ha sido eliminada correctamente.');

		});
	}

	function borrarExaDocente(btn)
	{
		var id = btn.value;
		var link = $('#borrarExamenDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		
		$.get(route, function(resp){

			var ruta = $('#docenteListexa').attr('href');
			var listaExamenes = $('#tablaExamenesAdm');
			alertify.alert("El examen ha sido borrado.");

			$.get(ruta, function(resp){

				listaExamenes.html(" ");

				$(resp).each(function(key, value){

					listaExamenes.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editExamenDocente(this);' data-toggle='modal' data-target='#edtExmDoc'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='createPreguntadDocente(this);'><i class='fa fa-database' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='listPreguntaDocente(this);'><i class='fa fa-book' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExaDocente(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

				});


			});
		});
	}

	//realizar la evaluacion al docente.
	function examenDocente(btn)
	{
		var id = btn.value;
		var examenId = $('#exaDocId').val(id);
		var link = $('#listPregDocente').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var pregunta = $('#pregQuizDocente');
		var respuesta = $('#quizRespDocente');
		var examenId = $('#quizDocId').val(id);
		
		$.get(route, function(resp){

			pregunta.html(" ");
          	respuesta.html(" ");

          	if(resp.pregunta.length == 0)
          	{
          		alertify.alert("Ya has evaluado a tu docente.");
            	$('#quizDocente').modal('hide');
            	
          	}else{

	          		$(resp).each(function(key, value){

					$(value.pregunta).each(function(key, preg){

						preguntaId = $('#pregIdDocente').val(preg.id);
						pregunta.append("<li>"+preg.contador+"<p>"+preg.contenido+"</p></li>");

						$(preg.respuestas_docentes).each(function(key, respu){
						
							respuesta.append("<li><input type='radio' name='posible_respuesta_id' value="+respu.id+">"+respu.name+"</li>");
						
						});
					});

				});
          	}

			
		});
	}

</script>