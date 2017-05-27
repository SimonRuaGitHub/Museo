/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var table;

function consultarTodosRestauradores()
{
    var url = '../BaseDeDatos/RestauradoresControlador.php';
	
    $.ajax(  {
                url: url,
                type: 'POST',
                async: true,
                data: { accion:'consultarTodos' },
                success: function(restauradores)
                {
                        console.log(JSON.stringify(restauradores));
                        llenarTablaRestauradores(restauradores);
                        iniciarPropiedadesTabla('#tblRestauradores');
                }
	     }
         );
}

function llenarTablaRestauradores(restauradores)
{
    var row;
    
    $(restauradores).each(
         	    function(i , restaurador)
         	    {        
                          row = '<tr id='+restaurador.Cedula+' class="clickable-row">\n\
                                 <td></td>\n\
                                 <td>'+restaurador.Cedula+'</td>\n\
                                 <td>'+restaurador.Nombres+'</td>\n\
                                 <td>'+restaurador.Apellidos+'</td>\n\
                                 <td>'+restaurador.Telefono+'</td>\n\
                                 <td>'+restaurador.Correo+'</td>\n\
                                 </tr>';  
                        
                          $('#tblRestauradores tbody').append(row);
         	    }         	            
         	  );
}