<script>
	
	$('#fimg').on('click', function(e){

	
		e.preventDefault();

		var id = $('#subimgId').val();
		var form = $('#imgSub');
		var link = form.attr('action');
		var metodo = form.attr('method');
		var route = link.split("%7Bid%7D").join(id);

		var formData = new FormData($('#imgSub')[0]);

		$.ajax({

			url: route,
			type: metodo,	
			data: formData,
			contentType: false,
			processData: false,
			cache: false,

			beforeSend:function(){

		        	 $.blockUI({ message: '<h1><img src="img/loading.gif" />Por favor espera...</h1>' });   

		        },

		     success:function(resp){

		        	 alertify.alert("La imagen ha sido guardada correctamente.");
		        	 $.unblockUI();


		        },


		     error:function(request, error){

				if(error == "timeout")
				{

					alertify.alert('Problemas de conexión por favor intentalo cuando tengas internet.');
				}else{

					alertify.alert('Error al procesar la solicitud.');
				}

			}



		});

	});

	
</script>