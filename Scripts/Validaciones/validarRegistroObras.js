function validarRegistrarObra()
{	
         var mensajes = "";
	 
	 $('#DivMensaje').removeClass("alert alert-danger");
	 $('#DivMensaje').removeClass("alert alert-success");
	 
         mensajes = this.validarCamposVacios();
	 mensajes += (mensajes != "" ? '<br>': "") + this.validarFecha();
	 	 
	 if(mensajes != "")
	 {
            $('#DivMensaje').addClass("alert alert-danger");
	    $('#DivMensaje').html("<strong>Error, Existen campos obligatorios vacios</strong><br><strong>Debe ingresar obligatoriamente: </strong>"+mensajes); 
         }
	 else
         {
		 this.RegistrarObra();
	 }     
}


function RegistrarObra()
{
	var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
	
	
	$.ajax(  {
 		       url: urlObrasControlador,
			   type: 'POST',
			   async: true,
			    data: { codigo:$('#txtCodigo').val(), nombre:$('#txtNombre').val(), tipo:$('#txtTipo').val(), fechaCreacion:$('#txtFechaCr').val(), 
			            periodo:$('#txtPeriodo').val(), fechaEntrada:$('#DtEntrada').val() , estilo: this.validarComboBox('#cboxEstilo'),
			            tecnica: this.validarComboBox('#cboxTecnica') , valor:$('#txtValor').val(), cantidad:$('#txtCantidad').val(), 
				    estado:$('#cboxEstado option:selected').text(), material: $('#txaMaterial').val(), autores: $('#txaAutores').val(),
                                    sala:$('#txtSala').val(),
				    accion: 'insertar'
			         },
		       success: function(flag_registro)
			   { 		
			           if(flag_registro == 1)		
			           {
			                $('#DivMensaje').removeClass("alert alert-danger");
	                                $('#DivMensaje').addClass("alert alert-success");
	                                $('#DivMensaje').html("<strong>Obra registrada con exito</strong>");
			           }
			            else 
			           {
                                     $('#DivMensaje').removeClass("alert alert-success");
	                             $('#DivMensaje').addClass("alert alert-danger");
	                             $('#DivMensaje').html("<strong>Revise ingreso inadecuadamente algun dato</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#DivMensaje').html("");
			   }
	         }
		  );
}

/*Valida los campos obligatorios para registrar la obra*/
function validarCamposVacios()
{
	var mjCamposVacios="";
		 
	if($('#txtCodigo').val() == '')
	   mjCamposVacios += "el codigo de la obra ";

        if($('#txtNombre').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '-': "") + "nombre de la obra ";
	 
	if($('#txtTipo').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '-  ': "") + "tipo ";
	 
	if($('#txtPeriodo').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "periodo ";

	if($('#txtFechaCr').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "Fecha creacion ";
	 
	if($('#DtEntrada').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "fecha de entrada al museo ";
	 
        if($('#txtValor').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "valor  ";
	 
	if($('#txtCantidad').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "cantidad ";
	 
	 if($('#cboxEstado option:selected').val() == 0)
             mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "un estado ";
 
	     return mjCamposVacios;
}

function validarFecha()
{
	  var mjFechaInvalida="";
	  var fechaActual = new Date();
          var añoMuseo = 1910; 
	  
	  if($('#DtEntrada').val() != '')
	  {
		 var fechaEntrada = new Date($('#DtEntrada').val());
		 if(fechaEntrada.getFullYear() > fechaActual.getFullYear() || fechaEntrada.getMonth() > fechaActual.getMonth() 
			 || fechaEntrada.getDate() > fechaActual.getDate())
	     {
			 if(fechaEntrada.getFullYear() < añoMuseo)
			    mjFechaInvalida = "Fecha de entrada al museo invalida";		 
		 }
			
	  }
	    
	  return mjFechaInvalida;
}

function validarComboBox(IDcbox) //Estilo y Tecnica unicamente
{  
	      if($(IDcbox +' option:selected').val() == 'seleccione' || $(IDcbox + ' option:selected').val() == 'nuevo'
                  || $(IDcbox +' option:selected').val() == 0)
			  return  '';
		  else
			  return $(IDcbox +' option:selected').val();
}

function guardarImagen()
{
         var file = $("#imagen")[0].files[0];
         var nombre = $("#nombreObra").val();
         
         $('#mensajeFoto').removeClass("alert alert-danger");
         $('#mensajeFoto').removeClass("alert alert-success");
         $('#mensajeFoto').removeClass("alert alert-warning");
         
         if(file != null && nombre != null)
         {
             this.guardarImagenBD(nombre,file);
         }
         else 
         {
             $('#mensajeFoto').addClass("alert alert-warning");
             $('#mensajeFoto').html("<strong>Por favor ingrese toda la informacion necesaria</strong>");
         }
}

function guardarImagenBD(nombre,file)
{
         var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
         
         $.ajax(  {
 		           url: urlObrasControlador,
			   type: 'POST',
			   async: true,
			    data: { nombre: nombre, imagen: "hello", accion: 'guardarImagen'		            
			         },
		       success: function(response)
			   { 		
			           if(response == 1)		
			           {
			                $('#mensajeFoto').removeClass("alert alert-danger");
	                                $('#mensajeFoto').addClass("alert alert-success");
	                                $('#mensajeFoto').html("<strong>Imagen guardada con exito</strong>");
			           }
			            else 
			           {
                                     $('#mensajeFoto').removeClass("alert alert-success");
	                             $('#mensajeFoto').addClass("alert alert-danger");
	                             $('#mensajeFoto').html("<strong>Revise los datos ingresados</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#mensajeFoto').html("");
			   }
	         }
		  );
}