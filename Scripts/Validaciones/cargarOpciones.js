function cargarOpciones()
{
	 cargarEstilos();
	 cargarTecnicas();
         cargarComponentesCompatibles();
        // cargarDatosActualizacion();
}

function abrirModalEstilo()
{
 var opcion = $('cboxEstilo option:selected').val();

       if(opcion == "nuevo")
       {
           alert(opcion);
       }
}

function cargarEstilos()
{
	var urlEstilosControlador = '../BaseDeDatos/EstilosControlador.php';
	
    $.ajax(  {
                url: urlEstilosControlador,
                type: 'POST',
                async: true,
                dataType: 'json',
                data:{ accion:'retornar' },
                success: function(estilos)
                {
                         llenarOpcionesEstilos(estilos);
                }
	      }
           ); 	
}

function llenarOpcionesEstilos(estilos)
{
         $(estilos).each(
         	                function(i , v)
         	                {
                                    $('#cboxEstilo').append('<option value="'+v.codigo+'">'+v.nombre+'</option>');
         	                }         	            
         	            )

}

function cargarTecnicas()
{
	var urlTecnicasControlador = '../BaseDeDatos/TecnicasControlador.php';
    
    $.ajax(  {
                url: urlTecnicasControlador,
                type: 'POST',
                async: true,
                dataType: 'json',
                data:{ accion:'retornar' },
                success: function(tecnicas)
                {
                         llenarOpcionesTecnicas(tecnicas);
                }
             }
          );    
}

function llenarOpcionesTecnicas(tecnicas)
{
         $(tecnicas).each(
                            function(i , v)
                            {
                                    $('#cboxTecnica').append('<option value="'+v.codigo+'">'+v.nombre+'</option>');
                            }                       
                        )

}

function cargarComponentesCompatibles()
{
      if ( $('#DtEntrada').prop('type') != 'date' ) 
      {
            $('#DtEntrada').datepicker({ dateFormat: 'yy-mm-dd' });
      }
}

function cargarDatosActualizacion()
{
         console.log(sessionStorage.estado);
         $('#txtCodigo').val(sessionStorage.codigo);
         $('#txtNombre').val(sessionStorage.nombre);
         $('#txtTipo').val(sessionStorage.tipo);
         $('#txtFechaCr').val(sessionStorage.fechaCreacion);
         $('#txtPeriodo').val(sessionStorage.periodo);
         $('#txtValor').val(sessionStorage.valor);
         $('#txtCantidad').val(sessionStorage.cantidad);
         $('#txtValor').val(sessionStorage.valor);
         $('#DtEntrada').val(sessionStorage.fechaEntrada);
         $('#cboxEstado').text(sessionStorage.estado);
         $('#cboxEstilo').text(sessionStorage.estilo);
         $('#cboxTecnica').text(sessionStorage.tecnica);
}