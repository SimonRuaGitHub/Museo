/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var cedula;

function iniciarActualizarRestaurador()
{ 
        cedula = this.getDataColumn(1);
        $('#txtCedulaAct').val(this.getDataColumn(1));
        $('#txtNombresAct').val(this.getDataColumn(2));
        $('#txtApelldiosAct').val(this.getDataColumn(3));
        $('#txtTelefonoAct').val(this.getDataColumn(4));
        $('#txtCorreoAct').val(this.getDataColumn(5));
        $('#ModalActRest').modal('show');
}

function actualizarRestaurador()
{
        var urlRestauradorControlador = '../BaseDeDatos/RestauradoresControlador.php';
        
         $.ajax(  {
 		           url: urlRestauradorControlador,
			   type: 'POST',
			   async: true,
			   data: { cedulaOriginal: cedula,
                                   cedula:$('#txtCedulaAct').val(), nombres: $('#txtNombresAct').val(),
                                   apellidos:  $('#txtApelldiosAct').val(), telefono: $('#txtTelefonoAct').val(),
                                   correo: $('#txtCorreoAct').val(),
				   accion: 'actualizar'
			         },
		           success: function(response)
			   { 	
                                   console.log(response);
			           if(response == 1)		
			           {
			               $('#DivMensajeAct').removeClass("alert alert-danger");
	                               $('#DivMensajeAct').addClass("alert alert-success");
	                               $('#DivMensajeAct').html("<strong>Restaurador actualizado con exito</strong>");
			           }
			            else 
			           {
                                     $('#DivMensajeAct').removeClass("alert alert-success");
	                             $('#DivMensajeAct').addClass("alert alert-danger");
	                             $('#DivMensajeAct').html("<strong>Revise bien los datos ingresados</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#DivMensajeElim').html("");
			   }
	         }
		  );
}

function iniciarEliminarRestaurador()
{
    $('#txtCedulaElim').val(this.getDataColumn(1));
    $('#txtNombresElim').val(this.getDataColumn(2));
    $('#ModalEliminar').modal('show');
}

function eliminarRestaurador()
{
        var urlRestauradorControlador = '../BaseDeDatos/RestauradoresControlador.php';
        
         $.ajax(  {
 		           url: urlRestauradorControlador,
			   type: 'POST',
			   async: true,
			   data: { cedula:$('#txtCedulaElim').val(),
				   accion: 'eliminar'
			         },
		           success: function(response)
			   { 	
			           if(response == 1)		
			           {
			               $('#DivMensajeElim').removeClass("alert alert-danger");
	                               $('#DivMensajeElim').addClass("alert alert-success");
	                               $('#DivMensajeElim').html("<strong>Restaurador borrado con exito</strong>");
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
				       $('#DivMensajeElim').html("");
			   }
	         }
		  );
}

