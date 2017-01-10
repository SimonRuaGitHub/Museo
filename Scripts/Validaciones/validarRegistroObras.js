function validarDatos()
{	
     var mensajes = "";
	 
	 $('#DivMensaje').removeClass("alert alert-danger");
	 $('#DivMensaje').removeClass("alert alert-success");
	 
     mensajes = validarCamposVacios();
	 mensajes += (mensajes != "" ? '<br>': "") + validarFecha();
	 	 
	 if(mensajes != "")
	 {
		$('#DivMensaje').addClass("alert alert-danger");
	    $('#DivMensaje').html("<strong>Error, Existen campos obligatorios vacios</strong><br><strong>Debe ingresar obligatoriamente: </strong>"+mensajes); 
     }
	 else
     {
		 validarRegistrarObras();
	 }     
}


function validarRegistrarObras()
{
	var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
	
	
	$.ajax(  {
 		       url: urlObrasControlador,
			   type: 'POST',
			   async: true,
			    data: { codigo:$('#txtCodigo').val(), nombre:$('#txtNombre').val(), tipo:$('#txtTipo').val(), fechaCreacion:$('#txtFechaCr').val(), 
			            periodo:$('#txtPeriodo').val(), fechaEntrada:$('#DtEntrada').val() , estilo:validarComboBox('#cboxEstilo'), 
			            tecnica:validarComboBox('#cboxTecnica') , valor:$('#txtValor').val(), cantidad:$('#txtCantidad').val(), 
						estado:$('#cboxEstado option:selected').text(), material: $('#txaMaterial').val(), autores: $('#txaAutores').val(),
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
	                             $('#DivMensaje').html("<strong>Revise si la obra ya existe</strong>");
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
	var mjCamposVacios = "";
		 
	if($('#txtCodigo').val() == '')
	   mjCamposVacios += "el codigo de la obra ";

    if($('#txtNombre').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '-': "") + "nombre de la obra ";
	 
	if($('#txtTipo').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '-  ': "") + "tipo ";
	 
	if($('#txtPeriodo').val() == '')
	   mjCamposVacios += (mjCamposVacios != "" ? '- ': "") + "periodo ";

	if($('txtFechaCr').val() == '')
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
	  var mjFechaInvalida = "";
	  var fechaEntrada = null;
	  var fechaActual = new Date();
	  var añoMuseo = 1910; 
	  
	  if($('#DtEntrada').val() != '')
	  {
		 fechaEntrada = new Date($('#DtEntrada').val());
		 if(fechaEntrada.getFullYear() > fechaActual.getFullYear() || fechaEntrada.getMonth() > fechaActual.getMonth() 
			 || fechaEntrada.getDate() > fechaActual.getDate())
	     {
			 if(fechaEntrada.getFullYear() < 1910)
			    mjFechaInvalida = "Fecha de entrada al museo invalida";		 
		 }
			
	  }
	    
	  return mjFechaInvalida;
}

function validarComboBox(IDcbox) //Estilo y Tecnica unicamente
{
	      if($(IDcbox +' option:selected').val() == 'seleccione' || $(IDcbox + ' option:selected').val() == 'nuevo')
			  return  '';
		  else
			  return $(IDcbox +' option:selected').val();
}


