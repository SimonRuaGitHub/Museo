function consultarValorTotalObras()
{
    var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
    
    $.ajax(   {
 		url: urlObrasControlador,
		type: 'GET',
		async: true,
		data: { 
			accion: 'totalObra'
		      },
		success: function(response)
			 { 	
                             $('#txtValorTotal').val(response.total);
			 }
	       }
           );
}
