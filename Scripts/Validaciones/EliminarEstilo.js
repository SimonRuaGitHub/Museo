/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function iniciarEliminarEstilo()
{
    $('#txtNombreElim').val(this.getDataColumn(2));
    $('#ModalEliminar').modal('show');
}

function eliminarEstilo()
{
    var urlEstilosControlador = '../BaseDeDatos/EstilosControlador.php';
        
         $.ajax(  {
 		           url: urlEstilosControlador,
			   type: 'POST',
			   async: true,
			    data: { nombre:$('#txtNombreElim').val(),
				    accion: 'eliminar'
			         },
		           success: function(response)
			   { 	
			           if(response == "true")		
			           {
			               $('#DivMensajeElim').removeClass("alert alert-danger");
	                               $('#DivMensajeElim').addClass("alert alert-success");
	                               $('#DivMensajeElim').html("<strong>Estilo eliminado con exito</strong>");
			           }
			            else 
			           {
                                     $('#DivMensajeElim').removeClass("alert alert-success");
	                             $('#DivMensajeElim').addClass("alert alert-danger");
	                             $('#DivMensajeElim').html("<strong>Revise bien el dato seleccionado</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#DivMensajeAdd').html("");
			   }
	         }
		  );
}
