/* 
 *  Codigo javascript para validar campos antes de actualizar la obra
 */
var codigoOriginal;

$('#my-modal').on('hidden.bs.modal', function () {
  window.alert('hidden event fired!');
});

function iniciarDatosActualizar()
{ 
        codigoOriginal = getDataColumn(1);     
        console.log("Tecnica: " +getDataColumn(13) + "-Estilo: "+getDataColumn(14));
     
         $('#ModalAct').modal('show');
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
        $("#cboxEstado option[value='"+getValue(getDataColumn(10),'#cboxEstado')+"']").prop("selected",true);
        $("#cboxEstilo option[value='"+getValue(getDataColumn(14),'#cboxEstilo')+"']").prop("selected",true);
        $("#cboxTecnica option[value='"+getValue(getDataColumn(13),'#cboxTecnica')+"']").prop("selected",true);
}

function getValue(data,selector)
{
        var options = $(selector +' option');
        var value = "";

     if(data != "")
     {
        value = $.map(options ,function(option) {
                  
                  if(option.text === data)
                      return option.value;
         });

     }
     else 
         value=0;
                  
         return value;
}

function validarActualizarObra()
{
         var mensajes = "";
	 
         console.log("validando datos de entrada para actualizar obra");
         
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
        
        imprimirDatosEnviados();

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

function imprimirDatosEnviados()
{
   console.log('codigo: ' + $('#txtCodigo').val()+ '\n' +
                'codigoOrg: '+ codigoOriginal+ '\n' +
                'nombre: '+$('#txtNombre').val() + '\n' + 
                'tipo: '+$('#txtTipo').val() +'\n'+ 
                'fechaCreacion: '+$('#txtFechaCr').val() + '\n' +
		'periodo: '+ $('#txtPeriodo').val() + '\n' +
                'fechaEntrada: '+$('#DtEntrada').val() + '\n'+
                'estilo: '+validarComboBox('#cboxEstilo') + '\n' +
		'tecnica: '+validarComboBox('#cboxTecnica') + '\n' +
                'valor: '+$('#txtValor').val() + '\n' + 
                'cantidad: '+$('#txtCantidad').val() + '\n'  +
		'estado: '+$('#cboxEstado option:selected').text() +'\n'+
                'material: '+$('#txaMaterial').val() +'\n'+
                'autores: '+$('#txaAutores').val() +'\n'+
		'accion: '+'actualizar');
}