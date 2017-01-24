/* 
 *  Codigo javascript para validar campos antes de actualizar la obra
 */
var codigoOriginal;

function iniciarDatosActualizar()
{ 
        codigoOriginal = getDataColumn(1);
        console.log(getDataColumn(1),getDataColumn(3));
        
        $('#ModalAct').modal('show'); 
        cargarOpciones();
        llenarCampos();
}

function llenarCampos()
{
        $('#txtCodigo').val(codigoOriginal);
        $('#txtValor').val(getDataColumn(8));
        $('#txtNombre').val(getDataColumn(3));
        $('#txtTipo').val(getDataColumn(2));
        $('#txtFechaCr').val(getDataColumn(4));
        $('#txtPeriodo').val(getDataColumn(5));
        $('#txaMaterial').text(getDataColumn(7));
        $('#txaAutores').text(getDataColumn(11));
        $('#txtCantidad').val(getDataColumn(9));
        $('#DtEntrada').val(getDataColumn(6));
        $('#cboxEstilo').text(getDataColumn(14));
        $('#cboxTecnica').text(getDataColumn(13));
}
        
function validarActualizarObra()
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
              actualizarObra();
	 }   
}

function actualizarObra()
{
    	var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
	
	
	$.ajax(  {
 		       url: urlObrasControlador,
			   type: 'POST',
			   async: true,
			    data: { codigo:$('#txtCodigo').val(),codigoOrg: codigoOriginal, nombre:$('#txtNombre').val(), tipo:$('#txtTipo').val(), fechaCreacion:$('#txtFechaCr').val(), 
			            periodo:$('#txtPeriodo').val(), fechaEntrada:$('#DtEntrada').val() , estilo:validarComboBox('#cboxEstilo'), 
			            tecnica:validarComboBox('#cboxTecnica') , valor:$('#txtValor').val(), cantidad:$('#txtCantidad').val(), 
						estado:$('#cboxEstado option:selected').text(), material: $('#txaMaterial').val(), autores: $('#txaAutores').val(),
						accion: 'actualizar'
			         },
		            success: function(flag_registro)
			   { 		
			           if(flag_registro == 1)		
			           {
			                $('#DivMensaje').removeClass("alert alert-danger");
	                                $('#DivMensaje').addClass("alert alert-success");
	                                $('#DivMensaje').html("<strong>Obra actualizada con exito</strong>");
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