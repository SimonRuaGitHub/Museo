/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global table */

function iniciarDatosEliminar()
{ 
     var nombre = this.getDataColumn(3);     
     var codigo = this.getDataColumn(1);
     
     console.log(codigo.toString()+":"+nombre.toString());
      
     $('#ModalEliminar').modal('show'); 
     $('#obra').append(codigo);
     
     $('#btnAceptarElim').click(function() {     
          eliminarObra(codigo);
      });
}

function eliminarObra(codObra)
{
       var url = '../BaseDeDatos/ObrasControlador.php';
	
       $.ajax(  {
                url: url,
                type: 'POST',
                async: true,
                data:{ accion:'eliminar' ,
                       codigo: codObra },
                success: function(confirm)
                {
                         if(confirm == 1)
                         {
                             location.reload();
                         }
                         else
                         {
                             alert("La obra no ha sido encontrada");
                         }
                }
	     }
         );
}
