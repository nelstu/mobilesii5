      //detectar carga de pagina3
                    $(document).on("pageshow","#page3",function(){ // When entering pagetwo

                    	var es=$("#txtuser").val();
                        var esfe=$("#txtfecha").val();

                        $("#tablaruta tr").remove();
                        $.ajax({
                            url: "http://"+direccion+"/buscarrutas2.php",
                            type:"POST",
                            dataType: "json",
                            data:{
                               auser: es,
                               aesfe: esfe,
                             },
                            })
                            .then( function ( response ) {
                             $.each( response, function ( i, val ) {
                                  $('#tablaruta').append('<tr data-cliente="'+val.Locales+'"><td>'+val.id+'</td><td>'+val.Locales+'</td><td>'+val.Estado+'</td></tr>');
                        });
                    });
                    });
                    


   $("#tablaruta").on("click",'tr td',function(event){
                 var target,idAlumno,valorSeleccionado;
                   target = $(event.target);
                   idAlumno = target.parent().data('cliente');
                   valorSeleccionado = target.text();
                   
                   $("#seleccionado").val(idAlumno)
                   //alert("Valor Seleccionado: "+valorSeleccionado+"\n idAlumno: "+ target.parent().data('idalumno'));


                  $.mobile.changePage("#page4");
                 });                    