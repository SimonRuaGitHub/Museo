function consultarTodasObras()
{
    var url = '../BaseDeDatos/ObrasControlador.php';
	
    $.ajax(  {
                url: url,
                type: 'POST',
                async: true,
                dataType: 'json',
                data:{ accion:'consultar' },
                success: function(obras)
                {
                         llenarTabla(obras);
                         iniciarAccionesTabla();
                }
	     }
         ); 	      
}

function llenarTabla(obras)
{
    var row;
    
    $(obras).each(
         	    function(i , d)
         	    {
                          ignorarNulos(d);
                          
                          row = '<tr id='+d.ID+' class="clickable-row">\n\
                                 <td></td>\n\
                                 <td>'+d.ID+'</td>\n\
                                 <td>'+d.tipo+'</td>\n\
                                 <td>'+d.nombre+'</td>\n\
                                 <td>'+d.fecha_creacion+'</td>\n\
                                 <td>'+d.periodo+'</td>\n\
                                 <td>'+d.fecha_entrada+'</td>\n\
                                 <td>'+d.material+'</td>\n\
                                 <td>'+d.valor+'</td>\n\
                                 <td>'+d.cantidad+'</td>\n\
                                 <td>'+d.estado+'</td>\n\
                                 <td>'+d.autores+'</td>\n\
                                 <td>'+d.museo+'</td>\n\
                                 <td>'+d.tecnica+'</td>\n\
                                 <td>'+d.estilo+'</td>\n\
                                 </tr>';  
                        
                          $('#tblObras tbody').append(row);
         	    }         	            
         	  );
}

function ignorarNulos(d)
{
     if(d.tecnica == null)
        d.tecnica = '';
     
     if(d.estilo == null)
        d.estilo = '';
    
     if(d.museo == null)
        d.museo = '';
    
     if(d.material == null)
        d.material = '';
    
     if(d.autores == null)
        d.autores = '';
}

function iniciarAccionesTabla()
{
          var table =   $('#tblObras').DataTable( {
        dataType: 'json',
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
    
    $( "#aElim" ).click(function() {
          var ids = $.map(table.rows('.selected').data(), function (item) {
           return item[1];
          });

          eliminarObra(ids.toString());
      });
      
      $( "#aAct" ).click(function() {     
          //cargarDatosObraEmisor(table);
      });
}

function cargarDatosObraEmisor(table)
{
         var obrasArray = new Array(14);
         var nombresColumnas = ["codigo","tipo","nombre","fechaCreacion","periodo","fechaEntrada",
                                "material","valor","cantidad","estado","Autores","museo","tecnica","estilo"];
                            
         for (i = 1; i <= 14 ; i++) 
         {
             obrasArray[i] = $.map(table.rows('.selected').data(), function (item) {
                                   return item[i];
                                });
             
             console.log(nombresColumnas[i-1]+":"+obrasArray[i]);
             
             sessionStorage.setItem(nombresColumnas[i-1],obrasArray[i]);
         } 
         
         console.log("Almacenaje de sesion: "+sessionStorage.codigo);
         window.location = "GestionCatalogo.php";
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
                             alert("obra eliminada con exito");
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

