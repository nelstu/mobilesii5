	function ver(p,v,u){
					 $("#txtprod").val(p);
                    $("#txtpr").val(v);
					$("#txtun").val(u);
	   			    //limpiar despues de busqueda
	   			    $('input[data-type="search"]').val("");
                    $('input[data-type="search"]').trigger("keyup");
				}


	function vercli(p){
					
	   			    //limpiar despues de busqueda
	   			    $("#txtcli").val(p);
	   			    $('input[data-type="search"]').val("");
                    $('input[data-type="search"]').trigger("keyup");
    
                    $.mobile.changePage("#page4");
                    $("#txtcli").val(p);
    
				}

	//$(document).ready(function() {
					var id = 1; 
      //    });
