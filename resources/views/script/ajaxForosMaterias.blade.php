	<script>
	
	$(document).on('ready', function(){

		function mensaje()
		{
			var id = $('#foroId').val();
			var link = $('#comentForo').attr('href');
			var route = link.split('%7Bid%7D').join(id);
			var div = $('#mchat');

			$.get(route, function(resp){

				div.html(" ");
				console.log(resp);
				$(resp).each(function(key, value){

					if(value.id == id)
					{
						$(value.comentarios).each(function(key, comt){

							$(comt.users).each(function(key, user){

								$(user.imagenes).each(function(key, img){

									div.append("<ul class='chat'><li class='left clearfix'><span class='chat-img pull-left'><img class='img-circle' width='50px' src='imagen/"+img.original_img+"' alt='User Avatar'></span><div class='chat-body clearfix'><div class='header'><strong class='primary-font'>"+user.name+"</strong><small class='pull-right text-muted'><span class='glyphicon glyphicon-time'>"+comt.created_at+"</span></small></div><p>"+comt.comment+"</p></div></li></ul>");



									});

								});

							});
					}

				});


			});
		}

		$('a#foroMateria').on('click', function(e){

			e.preventDefault();
			var route = $(this).attr('href');
			var foro = $('ul#foroList');

			$.get(route, function(resp){

				foro.html(" ");

				$(resp).each(function(key, value){

					foro.append("<li><a href="+value.id+" id='nameForo'>"+value.name+"</a></li>");


				});

				$('a#nameForo').on('click', function(e){

					e.preventDefault();
					$('#tbMateriaDoc').hide();
					$('#crtExamenDocente').hide();
					$('#mtaList').hide();
					$('#crr').hide();
					$('#semm').hide();
					$('#chatForo').show();
					$('div#act').hide();
					$('div#listAct').hide();
				    $('div#examen').fadeOut();
				    $('div#listExamen').hide();
				    $('div#calAct').hide();
				    $('div#planeacionC').fadeOut();
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
					$('#alumnosListUser').hide();
					$('#crr').hide();
					$('#froadm').hide();
					$('#alumnosListUser').hide();
					$('#preForo').show();
					$('#listExamenDocente').hide();
					$('#listExamenDoc').hide();
					$('#listRec').hide();
					$('#listRecMa').hide();
					$('#listRecMa').hide();
					$('#plcList').hide();
					$('#admPlc').hide();
					$('#plcAlm').hide();
					$('#act').fadeOut();
				  $('#crtSub').fadeOut();
				  $('#editUnidad').fadeOut();
				  $('#videoUnidad').fadeOut();
				  $('#listSubtemas').fadeOut();
				  $('#listAct').fadeOut();
				  $('#calAct').fadeOut();
				  $('#menUnidad').fadeOut();
				  $('div#preguntaExmamen').hide();
				  $('#vizuaPaquete').fadeOut();
				  $('#calAct').fadeOut();
				  $('#vizuaActividad').fadeOut();
				  $('#claPaquete').fadeOut();
					$('#consUser').fadeOut();
					$('#ltsMatexamen').fadeOut();
					$('#vizuaNota').fadeOut();
					$('#crtExaDiag').fadeOut();
					$('#evaList').fadeOut();
					$('#preguntaDiagnostico').fadeOut();	
					$('#listEva').fadeOut();
					$('#evaListAlm').fadeOut();
					$('#reporteDiag').hide();
					$('#reporteCarr').fadeOut();

					var id = $(this).attr('href');
					$('#foroId').val(id);
					var div = $('#mchat');
					var link = $('#comentForo').attr('href');
					var route = link.split('%7Bid%7D').join(id);

							//Foro tipo Tematico
					var foro = $('#showForo').attr('href');
					var foroRoute = foro.split('%7Bid%7D').join(id);

					$.get(foroRoute, function(resp){

						$('#preForo').html(resp.pregunta);

					});

					//Comentario de foros

					$.get(route, function(resp){

						div.html(" ");

						$(resp).each(function(key, value){

								if(value.id == id)
								{
									$(value.comentarios).each(function(key, comt){

										$(comt.users).each(function(key, user){
											
											$(user.imagenes).each(function(key, img){

												
												div.append("<ul class='chat'><li class='left clearfix'><span class='chat-img pull-left'><img id='imgTamaño' width='50px' class='img-circle' src='imagen/"+img.original_img+"' alt='User Avatar'></span><div class='chat-body clearfix'><div class='header'><strong class='primary-font'>"+user.name+"</strong><small class='pull-right text-muted'><span class='glyphicon glyphicon-time'>"+comt.created_at+"</span></small></div><p>"+comt.comment+"</p></div></li></ul>");

								
											});

										});

									});
								}

							});


					});

				});

				$('#btn-input').keypress(function(e){

					if(e.which == 13)
					{
						var foroId = $('#foroId').val();
						var foro = $('#fmchat');
						var link = foro.attr('action');
						var metodo = foro.attr('method');
						var route = link.split('%7Bid%7D').join(foroId);

						$.ajax({

							url: route,
							headers: { 'X-CSFR-TOKEN': token},
							type: metodo,
							cache: false,
							data: foro.serialize(),

							
							success:function(resp)
							{	
								setInterval(mensaje, 2500);
								var div = $('#mchat');
								$('#btn-input').val(" ");	
							}

						});
					}

				});

			});

		});

		$('#listForoadm').on('click', function(e){

			e.preventDefault();

			$('#tbMateriaDoc').hide();
			$('#crtExamenDocente').hide();
			$('#mtaList').hide();
			$('#crr').hide();
			$('#semm').hide();
			$('#froadm').show();
			$('#chatForo').hide();
			$('div#act').hide();
			$('div#listAct').hide();
		    $('div#examen').fadeOut();
		    $('div#listExamen').hide();
		    $('div#calAct').hide();
		    $('div#planeacionC').fadeOut();
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
			$('#listExamenDoc').hide();
			$('#listRec').hide();
			$('#listRecMa').hide();
			$('#plcList').hide();
			$('#admPlc').hide();
			$('#plcAlm').hide();
			$('#act').fadeOut();
		  $('#crtSub').fadeOut();
		  $('#editUnidad').fadeOut();
		  $('#videoUnidad').fadeOut();
		  $('#listSubtemas').fadeOut();
		  $('#listAct').fadeOut();
		  $('#calAct').fadeOut();
		  $('#menUnidad').fadeOut();
		  $('div#preguntaExmamen').hide();
		  $('#vizuaPaquete').fadeOut();
		  $('#calAct').fadeOut();
		  $('#vizuaActividad').fadeOut();
			$('#claPaquete').fadeOut();
			$('#consUser').fadeOut();
			$('#ltsMatexamen').fadeOut();
			$('#vizuaNota').fadeOut();
			$('#crtExaDiag').fadeOut();
			$('#evaList').fadeOut();
			$('#preguntaDiagnostico').fadeOut();	
			$('#listEva').fadeOut();
			$('#evaListAlm').fadeOut();
			$('#reporteDiag').hide();
			$('#reporteCarr').fadeOut();
				

			var route = $(this).attr('href');
			var tablaForo = $('#tablaForoadm');

			$.get(route, function(resp){

				tablaForo.html(" ");

				$(resp.data).each(function(key, value){

					console.log(value);
					tablaForo.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='borrarForo(this);'</button><i class='fa fa-eraser' aria-hidden='true'></td></tr>");

				});
				
			});

		});

	});

	function borrarForo(btn){

		var id = btn.value;
		var link = $('#deleteForo').attr('href');
		var route = link.split('%7Bid%7D').join(id);

		$.get(route, function(resp){

			alertify.alert('El foro ha sido borrado.');

			var route = $('#lstForo').attr('href');
			var tablaForo = $('#tablaForoadm');

			$.get(route, function(resp){

				tablaForo.html(" ");

				$(resp.data).each(function(key, value){

					tablaForo.append("<tr><td>"+value.name+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='borrarForo(this);'</button><i class='fa fa-eraser' aria-hidden='true'></td></tr>");

				});
				
			});

		});
	}

	$('#bchat').on('click', function(e){

			e.preventDefault();
			$('#chatForo').fadeOut();
			$('#chatOnline').fadeIn();

		});

	$('#chatOnline').on('click', function(e){

		e.preventDefault();

		$('#chatForo').fadeIn();
		$('#chatOnline').fadeOut();
	});

</script>