<script>
	
	$(document).on('ready', function(){

		//lista de todas las carreras que hay en el sistema.
		$('#lstCrra').on('click', function(e){


			e.preventDefault();

			$('#crr').show();
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
			$('#froadm').hide();
			$('#semm').hide();
			$('#mtaList').hide();

			listCarrera();

		});

		$('#mdlSemdos').on('click', function(e){

			e.preventDefault();

			createSemestre();
		});

		$('#mdlMatdos').on('click', function(e){

			e.preventDefault();

			createMateria();

		});

		$('#editPlancrr').on('click', function(e){

			e.preventDefault();

			editPlan();

		});

		
	});

	$('#mtaEdtCeprog').on('click', function(e){

				e.preventDefault();

				var id = $('#editMtaId').val();
				var form = $('#form-edtMdlMat');
				var link = form.attr('action');
				var metodo = form.attr('method');
				var route = link.split('%7Bmateria%7D').join(id);
				
				$.ajax({

					url: route,
					headers: { 'X-CSFR-TOKEN': token},
					type: metodo,
					data: form.serialize(),

					success:function(resp){

						alertify.alert("La materia ha sido editada correctamente.");

						var id = resp.semestre_id;
						var link = $('#listMta').attr('href');
						var route = link.split('%7Bmateria%7D').join(id);
						var Materias = $('#tablaDataMateria');
						$('#crr').hide();
						$('#semm').hide();
						$('#mtaList').show();

						$.get(route, function(resp){

							Materias.html(" ");

							$(resp.data).each(function(key, mat){

								Materias.append("<tr><td>"+mat.name+"</td><td><button class='btn btn-primary' value="+mat.id+" OnClick='editMateria(this);' data-toggle='modal' data-target='#editMta'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+mat.id+" OnClick='borrarMta(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

							});

						});


					}

				});

			});


	//boton submit para editar el semestre.
	$('#semmEditar').on('click', function(e){

			e.preventDefault();

			var id = $('#semmId').val();
			var form = $('#form-semm');
			var metodo = form.attr('method');
			var link = form.attr('action');
			var route = link.split('%7Bsemestre%7D').join(id);

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert("El semestres ha sido editado correctamente.");

					var id = resp.carrera_id;
					var link = $('#smeList').attr('href');
					var route = link.split('%7Bsemestre%7D').join(id);
					var semestre = $('#tablaDataSemestre');
					
					$.get(route, function(resp){

						semestre.html(" ");

						$(resp).each(function(key, sem){

							semestre.append("<tr><td>"+sem.name+"</td><td><button class='btn btn-primary' value="+sem.id+" OnClick='editSemestre(this);' data-toggle='modal' data-target='#editSemm'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+sem.id+" OnClick='listMaterias(this);'</button><i class='fa fa-folder-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+sem.id+" OnClick='crearMat(this);'</button><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+sem.id+" OnClick='borrarSemm(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

						});
					});
				}

			});
		});

	//Todas las funciones estan apartir de aqui.
	
	function createSemestre(){

			var form = $('#form-mdldos');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

			url: route,
			headers: { 'X-CSFR-TOKEN': token},
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert('El semestre ha sido creado correctamente.');
				$('#nameSemmodaldos').val(resp.name);
				$('#idSemmodaldos').val(resp.id);
			},

			error:function(error, request){

				if(error == "timeout")

				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}else{


					alertify.alert('Tienes errores en el formulario.');
				}


				}

			});


	}

	function createMateria(){

						var form = $('#form-mdlMatdos');
						var route = form.attr('action');
						var metodo = form.attr('method');

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							data: form.serialize(),

							success:function(resp){

								alertify.alert('La materia ha sido creada correctamente.');
								$('#mdlMtados').val(" ");
								$('#mdlCreditosdos').val(" ");

							},

							error:function(error, request){


								if(error == "timeout")

									{

										alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
									}else{


										alertify.alert('Tienes errores en el formulario.');
									}

							}

						});
	}

	
	function editPlan(){

			var id = $('#carreraIdEdit').val();
			var form = $('#form-planEdit');
			var link = form.attr('action');
			var metodo = form.attr('method');
			var route = link.split('%7Bcarrera%7D').join(id);

			$.ajax({

				url: route,
				headers: { 'X-CSFR-TOKEN': token},
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert('La carrera fue editada correctamente.');
					listCarrera();
					
				}

			});

	}
	//funcion para lista de todas las carreras
	function listCarrera(){

			var route = $('#craList').attr('href');
			var tabla = $('#tablaDataCarrera');

			$.get(route, function(resp){

				tabla.html(" ");

				$(resp.data).each(function(key, value){

					tabla.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='asignarId(this);' id="+value.name+" data-toggle='modal' data-target='#mdlPlandos'</button><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='editCarrera(this);' data-toggle='modal' data-target='#mdlEditcrt'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='listSemestres(this);'</button><i class='fa fa-folder-o' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrar(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

				});

			});
	}
	// Funcion para lista de semestres que tiene cada carrera
	function listSemestres(btn){

		var id = btn.value;
		var link = $('#smeList').attr('href');
		var route = link.split('%7Bsemestre%7D').join(id);
		var semestre = $('#tablaDataSemestre');
		$('#crr').hide();
		$('#mtaList').hide();
		$('#semm').show();


		$.get(route, function(resp){

			semestre.html(" ");

			$(resp).each(function(key, sem){

				semestre.append("<tr><td>"+sem.name+"</td><td><button class='btn btn-primary' value="+sem.id+" OnClick='editSemestre(this);' data-toggle='modal' data-target='#editSemm'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+sem.id+" OnClick='listMaterias(this);'</button><i class='fa fa-folder-o' aria-hidden='true'></i></td><td><button class='btn btn-primary' value="+sem.id+" OnClick='crearMat(this);' data-toggle='modal' data-target='#mdlMateriados'</button><i class='fa fa-plus-circle' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+sem.id+" OnClick='borrarSemm(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

			});
		});

	}
	// Funcion para mostrar todas las materias que tiene el semestre elegido.
	function listMaterias(btn){

		var id = btn.value;
		var link = $('#listMta').attr('href');
		var route = link.split('%7Bmateria%7D').join(id);
		var Materias = $('#tablaDataMateria');
		$('#crr').hide();
		$('#semm').hide();
		$('#mtaList').show();

		$.get(route, function(resp){

			Materias.html(" ");

			$(resp.data).each(function(key, mat){

				Materias.append("<tr><td>"+mat.name+"</td><td><button class='btn btn-primary' value="+mat.id+" OnClick='editMateria(this);' data-toggle='modal' data-target='#editMta'</button><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td><td><button class='btn btn-danger' value="+mat.id+" OnClick='borrarMta(this);'</button><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");
			});

		});
	}

	function editMateria(btn){

		var id = btn.value;
		var link = $('#materiaEdt').attr('href');
		var route = link.split('%7Bmateria%7D').join(id);

		$.get(route, function(resp){

			$('#editmdlMta').val(resp.name);
			$('#editmdlCreditos').val(resp.creditos);
			$('#editMtaId').val(resp.id);
			$('#editidSemmodal').val(resp.semestre_id);

		});

	}

	function borrarMta(btn){

		var id = btn.value;
		alert(id);

	}

	//se le coloca el id del semestre al input para luego crear la materia con la function crearMateria
	function crearMat(btn){

		var id = btn.value;
		$('#idSemmodaldos').val(id);
	}

	function borrarSemm(btn){

		var id = btn.value;
		var link = $('#borrarSemm').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			alertify.alert("El semestre ha sido borrado.");
			$('#crr').show();
			$('#semm').hide();

		});
	}

	//function para traer los datos del metodo edit.
	function editSemestre(btn){

		var id = btn.value;
		var link = $('#semmEdit').attr('href');
		var route = link.split('%7Bsemestre%7D').join(id);

		$.get(route, function(resp){

			$('#nameEditSem').val(resp.name);
			$('#semmId').val(resp.id);
			$('#editSem').val(resp.carrera_id);

		});

	}


	function asignarId(btn){

		var id = btn.value;
		var name = btn.id;
		$('#idCarrmodaldos').val(id);
		$('#carrModaldos').val(name);


	}

	function editCarrera(btn){

		var id = btn.value;
		var link = $('#editcrra').attr('href');
		var route = link.split('%7Bcarrera%7D').join(id);
		
		$.get(route, function(resp){

			$('#nameMedit').val(resp.name);
			$('#planNameedit').val(resp.plan);
			$('#revoeEdit').val(resp.revoe);
			$('#carreraIdEdit').val(resp.id);

		});

	}

	function borrar(btn){

		var id = btn.value;
		var link = $('#crrDelete').attr('href');
		var route = link.split('%7Bid%7D').join(id);	

		$.get(route, function(resp){

			alertify.alert("La carrera ha sido borrado.");
			listCarrera();

		});

	}




</script>