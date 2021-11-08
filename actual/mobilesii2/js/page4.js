        $(document).on("pageshow","#page4",function(){ // When entering pagetwo
                    	var u=$("#txtuser").val();
                    	var sel=$("#seleccionado").val();
                    	$("#txtus").val(u);
                        $("#txtcli").val(sel);

                    });

        					$("#btnAgregar").on("click",function(){
						var newid = id++; 
						var prod=$("#txtprod").val();
						var can=$("#txtcan").val();
						var un=$("#txtun").val();
						var pr=$("#txtpr").val();
						var tot=can*pr;

						$('#table').append('<tr id="'+newid+'"><td class="prod'+newid+'">'+prod+'</td><td class="un'+newid+'">'+un+'</td><td class="can'+newid+'">'+can+'</td><td id="xpr" class="pr'+newid+'" id="pr">'+pr+'</td><td id="xtot">'+tot+'</td><td><button type="button" class="deletebtn" >eli</button></td></tr>');
                        //suma totales tabla
                       var totalDeuda=0;
                        $("#table tr #xtot").each(function(){
                        	  var value = $(this).text();
                        	//var ca=parseInt($(this).find("td").eq(3).text());
       	                    totalDeuda+=parseInt(value);
       	                });

                        totalDeuda=totalDeuda+Math.round(totalDeuda*0.19);
                        $("#total").text("Total $"+totalDeuda);
                        //fin suma totales tabla

                        //limpiar
                         $("#txtprod").val("");
                         $("#txtpr").val("");
					     $("#txtun").val("");
                         $("#txtcan").val("");
                      
                    });

    $("#btnFinalizar").on("click",function(){
    	var user=$("#txtus").val();
    	var cli=$("#txtcli").val();	

    	var lastRowId = $('#table tr:last').attr("id"); /*finds id of the last row inside table*/
    	var prod= new Array(); 
    	var un = new Array();
    	var can = new Array();
    	var pr = new Array();
    	for ( var i = 1; i <= lastRowId; i++) {
    		prod.push($("#"+i+" .prod"+i).html()); /*pushing all the names listed in the table*/
    		un.push($("#"+i+" .un"+i).html()); /*pushing all the emails listed in the table*/
    		can.push($("#"+i+" .can"+i).html());
    		pr.push($("#"+i+" .pr"+i).html());
    	}
    	var sendprod = JSON.stringify(prod); 
    	var sendun = JSON.stringify(un);
    	var sendcan = JSON.stringify(can);
    	var sendpr = JSON.stringify(pr);

    	$.ajax({
    		type: 'POST',
    		data: {cli:cli,user:user ,prod : sendprod , un : sendun, can : sendcan, pr : sendpr} ,
    		url: 'http://'+direccion+'/finalizar.php',
    		success: function(data){

    			alert('Pedido Creado');
    			 $("#table tr").remove();
    			   $("#total").text("Total $");
    			 $.mobile.changePage("#page2", {reloadPage : true});
                 //       window.location.href = 'menu.html';
             },
             error: function(){

             	alert('Error al Crear el Pedido');
             }
         });

    	//alert("Finalizar");
    });    
    



    $(document).on('click', 'button.deletebtn', function () {
    	$(this).closest('tr').remove();
    	var totalDeuda=0;
    	$(".deuda").each(function(){
    		totalDeuda+=parseInt($(this).html()) || 0;
    	});
       totalDeuda=totalDeuda+Math.round(totalDeuda*0.19);
    	$("#total").text("Total $"+totalDeuda);
    	return false;
    });


     $( "#listview" ).on( "listviewbeforefilter", function ( e, data ) {
    	var $ul = $( this ),
    	$input = $( data.input ),
    	value = $input.val(),
    	html = "";
    	$ul.html( "" );
    	if ( value && value.length > 2 ) {
    		$ul.html( "<li><div class='ui-loader'><span class='ui-icon ui-icon-loading'></span></div></li>" );
    		$ul.listview( "refresh" );
    		$.ajax({
    			url: "http://"+direccion+"/buscarprod2.php",
    			dataType: "json",
    			crossDomain: true,
    			data: {
    				term: $input.val()
    			}
    		})
    		.then( function ( response ) {
    			$.each( response, function ( i, val ) {

    				cant=$("#cantidad").val();
    				html += "<li  onClick="+'"'+"ver('"+val.producto+"','"+val.venta+"','"+val.un+"');" +'"'+ "id='"+val.venta+"'>" + val.producto + "        $   " + val.venta + "<span  class='ui-li-count'>$" + val.venta2 + "</span></li>";
    			});
    			$ul.html( html );
    			$ul.listview( "refresh" );
                //$ul.trigger( "updatelayout");
            });
    	}
    });
    					
