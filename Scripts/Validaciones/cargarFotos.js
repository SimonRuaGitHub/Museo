/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function cargarObrasFotos()
{
    var urlObrasControlador = '../BaseDeDatos/ObrasControlador.php';
	
    $.ajax(  {
                url: urlObrasControlador,
                type: 'POST',
                async: true,
                dataType: 'json',
                data:{ accion:'consultarFotosObras' },
                success: function(fotos)
                {
                         llenarOpcionesFotosObras(fotos);
                }
	      }
           ); 	
}

function llenarOpcionesFotosObras(fotos)
{
    $(fotos).each(
                            function(i , registro)
                            {
                                    $("#foto").attr("src", "data:image/jpg;base64,"+registro.imagen);
                                    $("#foto").attr("width","200px");
                                    $("#foto").attr("heigth","200px");
                            }                       
                        )
}

