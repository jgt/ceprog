<script>
	
	$(document).on('ready', function(){


		$('#findUser').on('click', function(e){

			e.preventDefault();

			var form = $('#formFindUser');
			var route = form.attr('action');
			var personal = $('#tablaPersonal');
			var name = $('#nameUser').val();

			$.get(route, function(resp){

				personal.html(" ");

				$(resp).each(function(key, value){

					if(name == value.name)
					{

						personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");
					}

				});
			});


		});

		$('#listaP').on('click', function(e){

				e.preventDefault();

			$('div#act').addClass('alert');
			$('div#listAct').addClass('alert');
		    $('div#examen').addClass('alert');
		    $('div#listExamen').addClass('alert');
		    $('div#calAct').addClass('alert');
		    $('div#planeacionC').addClass('alert');
		    $('div#listSubtemas').addClass('alert');
		    $('#createVideos').addClass('alert');
			$('div#listAct').addClass('alert');
			$('#Almact').addClass('alert');
			$('div#vizuaUnidad').addClass('alert');
			$('div#AlmUni').addClass('alert');
			$('div#VunidadE').addClass('alert');
			$('div#calAct').addClass('alert');
			$('div#notasRubricas').addClass('alert');
			$('#listRub').addClass('alert');
			$('#listTutAlm').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');
			$('div#listUnidades').addClass('alert');
			$('#listPersonal').removeClass('alert');
			$('#prflistTuto').addClass('alert');
			$('#alumnosListUser').addClass('alert');
			$('#reportes').addClass('alert');

				var route = $('#admIndex').attr('href');
				var personal = $('#tablaPersonal');

				$.get(route, function(resp){

					personal.html(" ");
				
					$(resp.data).each(function(key, value){

						personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");

					});


				});


			});	


		$('.pagination a').on('click', function(e){

							e.preventDefault();

							var page = $(this).attr('href');
							var personal = $('#tablaPersonal');
							var id = page.split('page=')[1];
							var route = $('#admIndex').attr('href');

							$.ajax({

								url: route,
								data: {page: id},
								type: 'GET',
								dataType: 'json',
								success:function(resp){

									personal.html(" ");

									$(resp.data).each(function(key, value){

										personal.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' OnClick='verUser(this);' value="+value.id+" data-toggle='modal' data-target='#showUser'><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#updateUser' OnClick='editarUser(this);' value="+value.id+"><i class='fa fa-user'></i></button></td><td><button class='btn btn-primary' OnClick='borrarUser(this);' value="+value.id+"><i class='fa fa-eraser'></i></button></td></tr>");
									});
								}

							});

						});

		$('#admin').on('click', function(e){

			e.preventDefault();

			$('#listTut').addClass('alert');
			$('#tutoriales').removeClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listPersonal').addClass('alert');
			$('#alumnosListUser').addClass('alert');
			$('#reportes').addClass('alert');

		});


		$('#listTutorial').on('click', function(e){

			e.preventDefault();

			$('#listPersonal').addClass('alert');
			$('#tutoriales').addClass('alert');
			$('#listTut').removeClass('alert');
			$('#adminPlan').addClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#alumnosListUser').addClass('alert');
			$('#reportes').addClass('alert');

			var route = $('#allTutorial').attr('href');
			var tutorial = $('#tablaTutorial');

			$.get(route, function(resp){

				tutorial.html(" ");

				$(resp).each(function(key, value){


				var filename = value.original_filename;
                var cadena = filename.split(' ').join('%20');
					tutorial.append("<tr><td>"+value.original_filename+"</td><td><button class='btn btn-primary' OnClick='descargarTuto(this);' value="+cadena+"><i class='fa fa-download'></i></button></td><td><button class='btn btn-primary' OnClick='tutorialOnline(this);' data-toggle='modal' data-target='#tutoV' value="+value.id+"><i class='fa fa-eye'></i></button></td><td><button class='btn btn-primary' OnClick='borrarTuto(this);' value="+value.id+"><i class='fa fa-download'></i></button></td><tr>");

				});

			});

		});

	});


	function verUser(btn){

		var id = btn.value;
		var link = $('#adminShow').attr('href');
		var route = link.split('%7Badmin%7D').join(id);
		var showUser = $('#ShowUser');
		
		$.get(route, function(resp){

			showUser.html(" ");

			$(resp).each(function(key, value){

				$(value.roles).each(function(key, role){

					showUser.append("<tr><td>"+value.name+"</td><td>"+value.cuenta+"</td><td>"+role.name+"</td></tr>");

				});

			});

		});

	}

	function borrarUser(btn){

		var id = btn.value;
		var link = $('#adminDelete').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		
		$.get(route, function(resp){

			$('#listPersonal').addClass('alert');
			alertify.alert("El usuario ha sido borrado correctamente.");

		});

	}

	function editarUser(btn){

		var id = btn.value;
		var link = $('#adminEdit').attr('href');
		var route = link.split('%7Badmin%7D').join(id);
		var userRoles = $('#rolesUser');
		var userCarreras = $('#userCarreras');
		var userSemestres = $('#userSemestres');
		var userMaterias = $('#userMaterias');
		var divCarreras = $('#carrera_list');
		var divSemestres = $('#semestre_list');
		var divRoles = $('#role_list');
		var divMaterias = $('#materia_list');
		
		$.get(route, function(resp){

			userRoles.html(" ");
			userCarreras.html(" ");
			userSemestres.html(" ");
			userMaterias.html(" ");
			divCarreras.html(" "); 
		 	divSemestres.html(" ");
			divRoles.html(" "); 
		 	divMaterias.html(" "); 

		 	$(resp.carreras).each(function(key, value){


					divCarreras.append("<option value="+value.id+">"+value.name+"</option>");

				});

		 	$(resp.semestres).each(function(key, value){

					divSemestres.append("<option value="+value.id+">"+value.name+"</option>");

				});

		 	$(resp.materias).each(function(key, value){

					divMaterias.append("<option value="+value.id+">"+value.name+"</option>");

				});


		 	$(resp.roles).each(function(key, value){

					divRoles.append("<option value="+value.id+">"+value.name+"</option>");

				});

			$(resp.user).each(function(key, value){

				$('#nameUpdate').val(value.name);
				$('#cuentaUpdate').val(value.cuenta);
				$('#udpUser').val(value.id);

				$(value.roles).each(function(key, role){

					userRoles.append("<li>"+role.name+"</li>");

					divRoles.find("option[value="+role.id+"]").remove();
					divRoles.append("<option selected value="+role.id+">"+role.name+"</option");

					
					if(role.name == "alumno")
					{
						$('#mat_list').addClass('alert');
						$('#car_list').removeClass('alert');
						$('#sem_list').removeClass('alert');
					}

					if(role.name == "profesor")
					{
						$('#mat_list').removeClass('alert');
						$('#car_list').addClass('alert');
						$('#sem_list').addClass('alert');

					}

					if(role.name == "admin" || role.name == "alumno")
					{
						$('#mat_list').addClass('alert');
						$('#car_list').removeClass('alert');
						$('#sem_list').removeClass('alert');
					}

					if(role.name == "admin" || role.name == "profesor")
					{
						$('#mat_list').removeClass('alert');
						$('#car_list').addClass('alert');
						$('#sem_list').addClass('alert');
					}


					
				});

				$(value.carreras).each(function(key, carr){

					userCarreras.append("<li>"+carr.name+"</li>");

					divCarreras.find("option[value="+carr.id+"]").remove();
					divCarreras.append("<option selected value="+carr.id+">"+carr.name+"</option>");

					$(carr.semestres).each(function(key, sem){

						userSemestres.append("<li>"+sem.name+"</li>");

						divSemestres.find("option[value="+sem.id+"]").remove();
						divSemestres.append("<option selected value="+sem.id+">"+sem.name+"</option>");

						$(sem.materias).each(function(key, mat){

							userMaterias.append("<li>"+mat.name+"</li>");

							divMaterias.find("option[value="+mat.id+"]").remove();
							divMaterias.append("<option selected value="+mat.id+">"+mat.name+"</option>");

						});

					});

				});

			});

		});

	}

	$('#usrEdi').on('click', function(e){

		e.preventDefault();

		var id = $('#udpUser').val();
		var form = $('#formUpdate-user');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split('%7Badmin%7D').join(id);
		
		$.ajax({

			url: route,
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert(" el usuario esta editado");
				
				$("#carrera_list").select2("val", "");
				$("#semestre_list").select2("val", "");
				$("#materia_list").select2("val", "");
				$("#role_list").select2("val", "");


			}

		});
		
	});

	function borrarTuto(btn){

		var id = btn.value;
		var link = $('#deleteTuto').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			$('#listTut').addClass('alert');
			alertify.alert("El video ha sido borrado correctamente.");
		});
	}

	function descargarTuto(btn){

		var filename = btn.value;
		var link = $('#dwTutorial').attr('href');
		var route = link.split('%7BfileName%7D').join(filename);
		window.open(route);
	}

	function tutorialOnline(btn){

		var id = btn.value;
		var link = $('#allVideos').attr('href');
		var route = link.split('%7Bid%7D').join(id);
		var div = $('#divTuto');

		$.get(route, function(resp){

			div.html(" ");

			div.append("<video width='530'  height='300' id='fgt'  controls='controls'><source src='/tutoriales/"+resp.original_filename+"' type='video/webm'/><source src='/tutoriales/"+resp.original_filename+"' type='video/ogg'/><source src='/tutoriales/"+resp.original_filename+"' type='video/mp4'/></video>");

		});
		

	}

	$('#outVideo').on('click', function(e){

		var div = $('#divTuto');

		div.html(" ");

	});


		$('#Croles').on('click', function(e){

			e.preventDefault();

			$('#admRole').removeClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#listTut').addClass('alert');
			$('#tutoriales').addClass('alert');
			$('#listPersonal').addClass('alert');
			$('#reportes').addClass('alert');


		});

		$('#creRole').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createRole');
			var route = form.attr('action');
			var metodo = form.attr('method');

		$.ajax({

			url: route,
			type: metodo,
			data: form.serialize(),

			success:function(resp){

				alertify.alert(" El role ha sido creado correctamente");

			},

			error:function(request, error){

				if(error == "timeout")
				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}

			}


		});

		});


		$('#foroAdm').on('click', function(e){

			e.preventDefault();

			$('#admForo').removeClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#adminPlan').addClass('alert');
			$('#listTut').addClass('alert');
			$('#tutoriales').addClass('alert');
			$('#listPersonal').addClass('alert');
			$('#reportes').addClass('alert');

		});

		$('#admForoCrt').on('click', function(e){

			e.preventDefault();

			var form = $('#form-createForo');
			var route = form.attr('action');
			var metodo = form.attr('method');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),

				success:function(resp){

					alertify.alert(" El foro se ha creado correctamente");
				},

				error:function(request, error){

				if(error == "timeout")

					{

						alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
					}else{

						alertify.alert('Tienes errores en el formulario.');

					}
				}

			});

		});


		$('#planAdm').on('click', function(e){

			e.preventDefault();

			$('#adminPlan').removeClass('alert');
			$('#admRole').addClass('alert');
			$('div#user').addClass('alert');
			$('#admForo').addClass('alert');
			$('#listTut').addClass('alert');
			$('#tutoriales').addClass('alert');
			$('#listPersonal').addClass('alert');
			$('#reportes').addClass('alert');


		});

		$('#crePlan').on('click', function(e){


			e.preventDefault();

			var form = $('#form-plan');
			var metodo = form.attr('method');
			var route = form.attr('action');

			$.ajax({

				url: route,
				type: metodo,
				data: form.serialize(),


				success:function(resp){

					alertify.alert(" El plan ha sido creado correctamente.");

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


		});

</script>