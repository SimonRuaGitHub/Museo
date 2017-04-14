function validarDatos()
{
	 var mensaje = "";
	 
	 $('#lblMensaje').removeClass('error');
	 $('#lblMensaje').removeClass('bienvenido');
	 
	 if($('#txtNombreUsuario').val() == '')
	 {
		 mensaje = "Debe ingresar el nombre de usuario.";
	 }
	 
	 if($('#pswContrasena').val() == '')
	 {
		 mensaje += (mensaje != "" ? '<br>': "") + "Debe ingresar la contraseña.";
	 }
	 
	 if(mensaje != "")
     {
	    $('#lblMensaje').addClass('error');
	    $('#lblMensaje').html(mensaje);
	 }
	 else
	 {
		 validarIngreso();
	 }
}

function validarIngreso()
{
	var urlControlUsurios = '../BaseDeDatos/UsuarioControlador.php';
	
	$.ajax(  {
 		       url: urlControlUsurios,
			   type: 'POST',
			   async: true,
			   data: { usuario:$('#txtNombreUsuario').val() , contrasena:$('#pswContrasena').val() , accion: "verificar" },
		       success: function(resultado)
			   {
                                console.log(resultado);
				      if(resultado == "no_existe")
					  {
						  $('#lblMensaje').removeClass('confirmando');
						  $('#lblMensaje').addClass('error');
				                  $('#lblMensaje').html('Usuario desconocido');
					  }
					  else
					  {
					  	   switch(resultado)
					  	   {
                                                           case 'encargado catalogo': window.location = 'GestionCatalogo.php';
                                                           break;

                                                           case 'restaurador': window.location = 'Restauracion.php';
                                                           break;
                                  
                                                           case 'director': window.location = "DireccionMuseo.php";
                                                           break;
					  	   }
					  	   
					  }
			   },
			   beforeSend: function()
			   {
				          $('#lblMensaje').removeClass('error');
				          $('#lblMensaje').addClass('confirmando');
				          $('#lblMensaje').html('Cargando...');
                           }
	         }
		  );
}
