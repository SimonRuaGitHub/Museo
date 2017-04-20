/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function iniciarAnadirEstilo()
{
        $('#ModalAnadir').modal('show');
}

function validarAdicionEstilo()
{
         var mensaje = "";
	 
         console.log("validando datos de entrada para añadir estilo de obra");
         
	 $('#DivMensajeAdd').removeClass("alert alert-danger");
	 $('#DivMensajeAdd').removeClass("alert alert-success");
	 
         if($('#txtNombreAdd').val() == '')
            mensaje = "Debe ingresar un nombre";
         
         if(mensaje != "")
         {
            $('#DivMensajeAdd').addClass("alert alert-danger");
	    $('#DivMensajeAdd').html("<strong>"+mensaje+"</strong>"); 
         }
         else
         {
             adicionarEstilo();
         }
}

function adicionarEstilo()
{
        var urlEstilosControlador = '../BaseDeDatos/EstilosControlador.php';
        
         $.ajax(  {
 		           url: urlEstilosControlador,
			   type: 'POST',
			   async: true,
			    data: { nombre:$('#txtNombreAdd').val(),descripcion:$('#txaDescripcionAdd').val(),
				    accion: 'insertar'
			         },
		           success: function(response)
			   { 	
			           if(response == "true")		
			           {
			                $('#DivMensajeAdd').removeClass("alert alert-danger");
	                                $('#DivMensajeAdd').addClass("alert alert-success");
	                                $('#DivMensajeAdd').html("<strong>Estilo guardado con exito</strong>");
			           }
			            else 
			           {
                                     $('#DivMensajeAdd').removeClass("alert alert-success");
	                             $('#DivMensajeAdd').addClass("alert alert-danger");
	                             $('#DivMensajeAdd').html("<strong>Revise bien los datos ingresados</strong>");
			           }
				          
			   },
			   beforeSend: function()
			   {
				       $('#DivMensajeAdd').html("");
			   }
	         }
		  );
}



