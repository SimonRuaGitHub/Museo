var idObra;

function iniciarContextMenu()
{
    $('#tblObras').on('click', '.clickable-row', function(event)
    {
           $(this).addClass('active').siblings().removeClass('active');
    });
}

function actualizarObra()
{
    
}

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
                         iniciarContextMenu();
                }
	     }
         ); 	      
}

function llenarTabla(obras)
{
    var row;
    var checkbox;
    
    $(obras).each(
         	    function(i , d)
         	    {
                          ignorarNulos(d);
                          
                          checkbox = '<input type="checkbox" value="">';
                          
                          row = '<tr id='+d.ID+' class="clickable-row">\n\
                                 <td>'+checkbox+'</td>\n\
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