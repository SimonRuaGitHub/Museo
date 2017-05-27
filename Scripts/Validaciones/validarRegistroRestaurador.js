function validarRegistro()
{    
       var error;
      
       $('#infoCedula').html("");
       $('#infoNombres').html("");
       $('#infoApellidos').html("");
       $('#infoTelefono').html("");
       $('#infoCorreo').html("");

       error = this.validarObligatoriedad();
       
       if(!error)
          this.registrarRestaurador(); 
}

function registrarRestaurador()
{
         var urlControl = '../BaseDeDatos/RestauradoresControlador.php';
         
         $.ajax({
                  url: urlControl,
                  type: 'POST',
                  async: true,
                  data: {
                         accion: 'registrar', cedula:$('#Cedula').val(), nombres:$('#Nombres').val(), 
                         apellidos: $('#Apellidos').val(), telefono: $('#Telefono').val(), 
                         correo: $('#Correo').val()
                        },
                  success: function(response)
                  {
                      if(response == 1)
                      {
                         $('#mensaje').html("<strong>Restaurador registrado con exito</strong>");
                      }
                      else 
                      {
                          $('#mensaje').html("<strong>Revise bien los datos ingresados</strong>");
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown)
                  {
            
                  }
           })      
}

function validarObligatoriedad()
{
    var error = false;
    
    $("input[type='text']").each(function() 
    {
          if($('#Nombres').val() == ''){
             $('#infoNombres').html("<strong>Por favor ingrese nombres</strong>");
             error  = true;
          }
          
          if($('#Apellidos').val() == ''){
             $('#infoApellidos').html("<strong>Por favor ingrese apellidos</strong>");
             error = true;
          }
    });

    $("input[type='number']").each(function() 
    {
        if($('#Cedula').val() == ''){
           $('#infoCedula').html("<strong>Por favor ingrese cedula</strong>");
           error  = true;
        }
        
        if($('#Telefono').val() == ''){
           $('#infoTelefono').html("<strong>Por favor ingrese telefono</strong>");
           error = true;
        }
    });
    
    $("input[type='email']").each(function() 
    {
        if($('#Correo').val() == '')
        {
           $('#infoCorreo').html("<strong>Por favor ingrese correo</strong>");
           error = true;
        }
    });
    
    return error;
}