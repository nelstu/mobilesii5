		$("#btnLogin").on("click",function(){
						var ulogin=$("#txtuser").val();
						var uclave=$("#txtpass").val();
                        //consulta ajax acceso
                        $.ajax({
                        	type: 'POST',
                        	data: {ulogin:ulogin,uclave:uclave } ,
                        	url: 'http://'+direccion+'/login.php',
                        	success: function(data){
                  
                        		$.mobile.changePage("#page2");
                        	},
                        	error: function(){
                  
                        		alert('There was an error adding your comment');
                        	}
                        });
                        //fin consulta ajax acceso
                    });