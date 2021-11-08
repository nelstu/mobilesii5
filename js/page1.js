		$("#btnLogin").on("click",function(){
						var ulogin=$("#txtuser").val();
						var uclave=$("#txtpass").val();
                        //consulta ajax acceso
                        $.ajax({
                        	type: 'POST',
                        	data: {ulogin:ulogin,uclave:uclave } ,
                        	url: 'http://'+direccion+'/login.php',
                        	success: function(data){
                                //localStorage.setItem("login", ulogin);
                                //localStorage.setItem("pass", uclave);
                          //   window.localStorage.setItem("login", JSON.stringify(ulogin));
                          //   window.localStorage.setItem("pass", JSON.stringify(uclave));
                        		$.mobile.changePage("#page2");
                        	},
                        	error: function(){
                  
                        		alert('There was an error adding your comment');
                        	}
                        });
                        //fin consulta ajax acceso
                    });