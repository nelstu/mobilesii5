                $(document).on("pageshow","#page6",function(){ // When entering pagetwo

                        var es=$("#txtuser").val();
                        var esfe=$("#txtfecha2").val();
                        var totalx=0;

                        $("#tablaventasdia tr").remove();
                        $.ajax({
                            url: "http://"+direccion+"/buscarrutas2vta.php",
                            type:"POST",
                            dataType: "json",
                            data:{
                               auser: es,
                               aesfe: esfe,
                             },
                            })
                            .then( function ( response ) {
                             $.each( response, function ( i, val ) {

                                  $('#tablaventasdia tbody').append('<tr data-id="'+val.id+'"><td>'+val.id+'</td><td>'+val.cliente+'</td><td>'+val.estado+'</td><td>'+val.total+'</td></tr>');
                                   totalx=totalx+parseFloat(val.total);
                                  });
                              
                              
                               $("#estadistica").text(totalx);
                    });
                    });


                   $("#tablaventasdia").on("click",'tr td',function(event){
                 var target,idAlumno,valorSeleccionado;
                   target = $(event.target);
                   idAlumno = target.parent().data('id');
                   valorSeleccionado = target.text();
                   //alert(idAlumno);
                   
                   $("#txtid").val(idAlumno)
                   

                   $.ajax({
                            url: "http://"+direccion+"/buscarpedido.php",
                            type:"POST",
                            dataType: "json",
                            data:{
                               nped: idAlumno,
                              // aesfe: esfe,
                             },
                            })
                            .then( function ( response ) {
                             $.each( response, function ( i, val ) {
                                   u=val.user;
                                   ucliente=val.cliente;
                                   
                                  });

                              $("#txtid").val(idAlumno);
                              $("#txtus1").val(u);
                              $("#txtcli1").val(ucliente);
                              
                                  });


                      $.ajax({
                            url: "http://"+direccion+"/buscardetpedido.php",
                            type:"POST",
                            dataType: "json",
                            data:{
                               nped: idAlumno,
                              // aesfe: esfe,
                             },
                            })
                            .then( function ( response ) {
                             $.each( response, function ( i, val ) {
                                   ucant=val.cant;
                                   uproducto=val.producto;
                                   uprecio=val.precio;

                         $('#table1').append('<tr><td>'+uproducto+'</td><td>'+ucant+'</td><td>'+uprecio+'</td></tr>');
                       
                                  });

                            
                              
                                  });       



                  $.mobile.changePage("#page7");
                 });      