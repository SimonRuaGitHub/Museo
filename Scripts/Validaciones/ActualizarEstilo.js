/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function iniciarDatosActualizarEstilo()
{    
        console.log("Codigo: " +getDataColumn(1) + "-Nombre: "+getDataColumn(2));
        
        $('#ModalAct').modal('show');
        llenarCamposEstilo();
}

function llenarCamposEstilo()
{
        $('#txtCodigo').val(getDataColumn(1));
        $('#txtNombre').val(getDataColumn(2));
        $('#txaDescripcion').val(getDataColumn(3));
}

function validarActulizarEstilo()
{
        var mensaje = "";
	 
         console.log("validando datos de entrada para actualizar estilo de obra");
         
	 $('#DivMensaje').removeClass("alert alert-danger");
	 $('#DivMensaje').removeClass("alert alert-success");
	 
         if($('#txtNombre').val() == '')
            mensaje = "Debe ingresar un nombre";
         
         if(mensaje != "")
         {
            $('#DivMensaje').addClass("alert alert-danger");
	    $('#DivMensaje').html("<strong>"+mensaje+"</strong>"); 
         }
         else
         {
             actualizarEstilo();
         }
         
}

function actualizarEstilo()
{
    	var urlEstilosControlador = '../BaseDeDatos/EstilosControlador.php';

	$.ajax(  {
 		           url: urlEstilosControlador,
			   type: 'POST',
			   async: true,
			    data: { codigo:$('#txtCodigo').val(), nNombre:$('#txtNombre').val(),nDescripcion:$('#txaDescripcion').val(),
				    accion: 'actualizar'
			         },
		           success: function(response)
			   { 	
			           if(response == "true")		
			           {
			                $('#DivMensaje').removeClass("alert alert-danger");
	                                $('#DivMensaje').addClass("alert alert-success");
	                                $('#DivMensaje').html("<strong>Estilo actualizado con exito</strong>");
			           }
			            else 
			           {
                                     $('#DivMensaje').removeClass("alert alert-success");
	                             $('#DivMensaje').addClass("alert alert-danger");
	                             $('#DivMensaje').html("<strong>Revise bien los datos ingresados</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#DivMensaje').html("");
			   }
	         }
		  );
}