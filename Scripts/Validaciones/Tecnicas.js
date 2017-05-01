/* 
   Script para actualizar, eliminar y crear tecnica
 */
var nombre;

function iniciarActualizarTecnica()
{
        console.log("Codigo: " +this.getDataColumn(1) + "-Nombre: "+this.getDataColumn(2));
        
        nombre = this.getDataColumn(2);
        
        $('#ModalAct').modal('show');
        this.llenarCamposTecnica();
}

function llenarCamposTecnica()
{
        $('#txtCodigo').val(this.getDataColumn(1));
        $('#txtNombre').val(this.getDataColumn(2));
        $('#txaDescripcion').val(this.getDataColumn(3));
}

function validarActulizarTecnica()
{
        var mensaje="";
	 
         console.log("validando datos de entrada para actualizar tecnica de obra");
         
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
             this.actualizarTecnica();
         }
}

function actualizarTecnica()
{
         var urlTecnicasControlador = '../BaseDeDatos/TecnicasControlador.php';

	$.ajax(  {
 		           url: urlTecnicasControlador,
			   type: 'POST',
			   async: true,
			    data: { nombre:  nombre, nNombre:$('#txtNombre').val(),nDescripcion:$('#txaDescripcion').val(),
				    accion: 'actualizar'
			         },
		           success: function(response)
			   { 	
			           if(response == "true")		
			           {
			                $('#DivMensaje').removeClass("alert alert-danger");
	                                $('#DivMensaje').addClass("alert alert-success");
	                                $('#DivMensaje').html("<strong>La tecnica actualizado con exito</strong>");
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

function iniciarEliminarTecnica()
{
    $('#txtNombreElim').val(this.getDataColumn(2));
    $('#ModalEliminar').modal('show');
}

function eliminarTecnica()
{
         var urlTecnicasControlador = '../BaseDeDatos/TecnicasControlador.php';
        
         $.ajax(  {
 		           url: urlTecnicasControlador,
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
	                               $('#DivMensajeElim').html("<strong>Tecnica eliminada con exito</strong>");
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

function iniciarAnadirTecnica()
{
        $('#ModalAnadir').modal('show');
}

function validarAdicionTecnica()
{
         var mensaje = "";
	 
         console.log("validando datos de entrada para añadir tecnica de obra");
         
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
             this.adicionarTecnica();
         }
}

function adicionarTecnica()
{
        var urlTecnicasControlador = '../BaseDeDatos/TecnicasControlador.php';
        
         $.ajax(  {
 		           url: urlTecnicasControlador,
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