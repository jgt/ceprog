<script>

    $(document).on('ready', function(){

      $('a#LexamenMaestro').on('click', function(e){

          e.preventDefault();
           $('#listExamen').hide();
          $('div#act').hide();
          $('div#examen').hide();
          $('div#pregunta').hide();
          $('div#user').hide();
          $('div#listAct').hide();
          $('div#calAct').hide();
          $('div#planeacionC').hide();
          $('div#listUnidades').hide();
          $('div#listSubtemas').hide();
          $('#createVideos').hide();
          $('div#vizuaUnidad').hide();
          $('div#VunidadE').hide();
          $('#listTutAlm').hide();
          $('#adminPlan').hide();
          $('#admRole').hide();
          $('div#user').hide();
          $('#admForo').hide();
          $('#listTut').hide();
          $('#alumnosListUser').hide();
          $('#listPersonal').hide();
          $('#reportes').hide();
          $('#chatForo').hide();
          $('#crr').hide();
          $('#listPreg').hide();
          $('#listExamenDocente').show();

          var tabla = $('#tablaExamenesDocente');
          var route = $(this).attr('href');

          $.get(route, function(resp){

            tabla.html(' ');

            if(resp.total == 0)
            {
              alertify.alert('La materia no tiene examenes.');
              $('#listExamenDocente').hide();
            }else{

              $(resp.data).each(function(key, value){

               tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='preguntas(this);'><i class='fa fa-search' aria-hidden='true'></i><td><button class='btn btn-primary' value="+value.id+" OnClick='verExamen(this);'><i class='fa fa-eye' aria-hidden='true'></i></td></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

            }); 

            } 

          });

      });

      
      $('#updateExa').on('click', function(e){

        e.preventDefault();

        var id = $('#exa_id').val();
        var form = $('#form-exa');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);

        $.ajax({

          url: route,
          headers: { 'X-CSFR-TOKEN': token},
          type: metodo,
          data: form.serialize(),

          success:function(resp){

            alertify.alert('El examen ha sido editado correctamente.');

             var tabla = $('#tablaExamenesDocente');
             var link = $('#LexamenMaestro').attr('href');
             var ruta = link.split('%7Bid7D').join(id);

          $.get(ruta, function(resp){

            tabla.html(' ');

            $(resp.data).each(function(key, value){

               tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-pencil-square-o'></i></td></tr>");

            });  

          });

          }

        });

      });

      
      $('#updatePreg').on('click', function(e){

          e.preventDefault();
          var id = $('#edpreguntaId').val();
          var form = $('#edPreg-form');
          var link = form.attr('action');
          var metodo = form.attr('method');
          var route = link.split('%7Bid%7D').join(id);
          
          $.ajax({

              url: route,
              headers: { 'X-CSFR-TOKEN': token},
              type: metodo,
              data: form.serialize(),

              success:function(resp){

                alertify.alert('La pregunta fue editada correctamente.');

              }

          })

      });


      //lista de examenes para estudiantes
      $('a#Lexamen').on('click', function(e){

        e.preventDefault();

        var tablaExamenes = $('#tablaExamenes');
        var route = $(this).attr('href');
          $('#listExamen').show();
          $('div#act').hide();
          $('div#examen').hide();
          $('div#pregunta').hide();
          $('div#user').hide();
          $('div#listAct').hide();
          $('div#calAct').hide();
          $('div#planeacionC').hide();
          $('div#listUnidades').hide();
          $('div#listSubtemas').hide();
          $('#createVideos').hide();
          $('div#vizuaUnidad').hide();
          $('div#VunidadE').hide();
          $('#listTutAlm').hide();
          $('#adminPlan').hide();
          $('#admRole').hide();
          $('div#user').hide();
          $('#admForo').hide();
          $('#listTut').hide();
          $('#alumnosListUser').hide();
          $('#listPersonal').hide();
          $('#reportes').hide();
          $('#chatForo').hide();
          $('#crr').hide();
        
        $.get(route, function(resp){

          tablaExamenes.html(" ");

          $(resp.data).each(function(key, value){

            if(moment().format() >= value.fecha && moment().format() <= value.fechaF)
            {

              tablaExamenes.append("<tr><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='realizarExamen(this);' data-toggle='modal' data-target='#quiz'><i class='fa fa-pencil-square-o'></i></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td><td><button class='btn btn-primary' id='Ex' value="+value.id+" OnClick='notaExamen(this);' data-toggle='modal' data-target='#notaExamen'><i class='fa fa-pencil-square-o'></i></td></tr>");

            }else{
              
              tablaExamenes.append("<tr><td><strong>No activado</strong></td><td>"+value.fecha+"</td><td>"+value.fechaF+"</td></tr>");

            }
            
          });

        });

      });

        $('#nextQuiz').on('click', function(e){

        e.preventDefault();

        var id = $('#exaId').val();
        var form = $('#dpg');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);

        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              var id = $('#exaId').val();
              var prueba = $('#pruebaR').attr('href');
              var route = prueba.split('%7Bid%7D').join(id);
              var divPreg = $('#pregQuiz');
              var ulQuiz = $('#quizResp');

              $.get(route, function(resp){

                divPreg.html(" ");
                ulQuiz.html(" ");

                var nota = $('#ntEx').val(resp.nota);

                $(resp.pregunta).each(function(key, preg){

                  var preguntaId = $('#pregId').val(preg.id);

                  divPreg.append("<p>"+preg.contenido+"</p>");

                  $(preg.respuestas).each(function(key, respu){

                    ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");

                    
                  });

                });

              });
              
            },

            error:function(request, error)
            {

              if(error)
              {
                $('#nextQuiz').hide();
                $('#endQuiz').show();
              }

            }

          });

      });

      $('#endQuiz').on('click', function(e){

        e.preventDefault();

        var id = $('#exaId').val();
        var form = $('#exForm');
        var link = form.attr('action');
        var metodo = form.attr('method');
        var route = link.split('%7Bid%7D').join(id);
        
        $.ajax({

            url: route,
            headers: { 'X-CSFR-TOKEN': token},
            type: metodo,
            data: form.serialize(),

            success:function(resp){

              $('#ntEx').val(' ');
              $('#qexaId').val(' ');
              alertify.alert("El examen ha termiando correctamente.");
              $('#quiz').modal('hide');
              var id = resp.id;
              var link = $('#pdfExamen').attr('href');
              var route = link.split('%7Bid%7D').join(id);
              window.open(route);

            },

            error:function(request, error){

              if(error)
              {

                alertify.alert("Error al procesar la solicitud.");
              }

            }


        });


      });

    });



    //funciones para lista de examenes perfil maestro
    function realizarExamen(btn)
      {

         $('#nextQuiz').show();
         $('#endQuiz').hide();
        var idExamen = $('#qexaId').val(btn.value);
        var prueba = $('#pruebaR').attr('href');
        var route = prueba.split('%7Bid%7D').join(btn.value);
        var divPreg = $('#pregQuiz');
        var ulQuiz = $('#quizResp');
        var examenId = $('#exaId').val(btn.value);
        
        $.get(route, function(resp){

          divPreg.html(" ");
          ulQuiz.html(" ");

          

          $(resp.pregunta).each(function(key, preg){

            var preguntaId = $('#pregId').val(preg.id);
            divPreg.append("<p>"+preg.contenido+"</p>");

            $(preg.respuestas).each(function(key, respu){

              ulQuiz.append("<li><input type='radio' name='respuesta' value="+respu.id+">"+respu.name+"</li>");

            });

          });

        });

      }


      function verExamen(btn)
      {

        var id = btn.value;
        var link = $('#verExa').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        window.open(route);

      }

      function notaExamen(btn)
      {

        var id = btn.value;
        var link = $('#ntoExamen').attr('href');
        var route = link.split('%7Bid%7D').join(id);
        var examen = $('#tablaNexamen');

        $.get(route, function(resp){

          examen.html(" ");
          
          $(resp).each(function(key, value){

            $(value.examen).each(function(key, exa){

              $(value.user).each(function(key, user){

                if(value.user_id == user.id)
                {

                  examen.append("<tr><td>"+exa.modulo+"</td><td>"+value.resultado+"</td></tr>");
                }

              });

            });

          });

        });


      }

      function borrarExamen(btn)
      {

          var id = btn.value;
          var link = $('#deleteEx').attr('href');
          var route = link.split('%7Bid%7D').join(id);

          $.get(route, function(resp){

             var tabla = $('#tablaExamenesDocente');
             var link = $('#LexamenMaestro').attr('href');
             var ruta = link.split('%7Bid7D').join(id);

             alertify.alert('El examen ha sido borrado.');

             $.get(ruta, function(resp){

                tabla.html(' ');

                $(resp.data).each(function(key, value){

              tabla.append("<tr><td>"+value.modulo+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarExamen(this);' data-toggle='modal' data-target='#editarExamen'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-primary' value="+value.id+" OnClick='preguntas(this);'><i class='fa fa-search' aria-hidden='true'></i><td><button class='btn btn-primary' value="+value.id+" OnClick='verExamen(this);'><i class='fa fa-eye' aria-hidden='true'></i></td></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarExamen(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");


                });  

             });

          });
      }

      function editarExamen(btn)
      {

          var id = btn.value;
          var link = $('#editExamen').attr('href');
          var route = link.split('%7Bid%7D').join(id);
          $('#exa_id').val(id);

          $.get(route, function(resp){

            $('#editExmat').val(resp.materia_id);
            $('#authExam').val(resp.catedratico);
            $('#modExam').val(resp.modalidad);
            $('#mdExamen').val(resp.modulo);
            $('#ini').val(resp.fecha);
            $('#fin').val(resp.fechaF);

          });
      }


      //funciones para el la lista de examenes perfil maestro seccion preguntas
      function preguntas(btn)
      { 

        $('#listPreg').show();
        $('#listExamenDocente').hide();
        var id = btn.value;
        var dltPregunta = $('#idDlt').attr('href', id);
        var link = $('#listPreguntas').attr('href')
        var route = link.split('%7Bid%7D').join(id);
        var tabla = $('#tablaPreguntas');

        $.get(route, function(resp){

            tabla.html(' ');
              
              if(resp.total == 0)
              {
                alertify.alert('Este examen no tiene preguntas.');
                $('#listPreg').hide();
                $('#listExamenDocente').show();
              }else{

                $(resp.data).each(function(key, value){

                  tabla.append("<tr><td>"+value.contenido+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarPregunta(this);' data-toggle='modal' data-target='#editPregunta'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarPregunta(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

                });

              }

        });

      }

      function editarPregunta(btn)
      {

        var id = btn.value;
        var link = $('#edPreg').attr('href');
        var route = link.split('%7Bid%7D').join(id);

        $.get(route, function(resp){

            $('#edenunciado').val(resp.contenido);
            $('#edvalor').val(resp.valor);
            $('#edexamenId').val(resp.examen_id);
            $('#edpreguntaId').val(resp.id);

        });

      }

      function borrarPregunta(btn)
      {

        var id = btn.value;
        var link = $('#dltPregunta').attr('href');
        var route = link.split('%7Bid%7D').join(id);

        //lista de preguntas
        var idExa = $('#idDlt').attr('href');
        var enlace = $('#listPreguntas').attr('href')
        var ruta = enlace.split('%7Bid%7D').join(idExa);
        var tabla = $('#tablaPreguntas');

        
        $.get(route, function(resp){

          alertify.alert('La pregunta ha sido borrada.');

        });

          //lista de preguntas
         $.get(ruta, function(resp){

            tabla.html(' ');

            $(resp).each(function(key, value){

              tabla.append("<tr><td>"+value.contenido+"</td><td><button class='btn btn-primary' value="+value.id+" OnClick='editarPregunta(this);' data-toggle='modal' data-target='#editPregunta'><i class='fa fa-pencil-square-o'></i></td><td><button class='btn btn-danger' value="+value.id+" OnClick='borrarPregunta(this);'><i class='fa fa-eraser' aria-hidden='true'></i></td></tr>");

            });

        });


      }



  </script>