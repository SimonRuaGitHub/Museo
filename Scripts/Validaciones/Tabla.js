var table;

function consultarTecnicas()
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
                         llenarTablaTecnicas(tecnicas);
                         iniciarPropiedadesTabla('#tblTecnicas');
                }
             }
          );  
}

function consultarTodosEstilos()
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
                          llenarTablaEstilos(estilos);
                          iniciarPropiedadesTabla('#tblEstilos');
                }
	      }
           ); 	
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
                         llenarTablaObras(obras);
                         iniciarPropiedadesTabla('#tblObras');
                }
	     }
         );
}

function llenarTablaObras(obras)
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

function llenarTablaEstilos(estilos)
{
     var row;
    
    $(estilos).each(
         	    function(i , estilo)
         	    {
                          ignorarNulosEstilo(estilo);
                          
                          row = '<tr id='+estilo.Codigo+' class="clickable-row">\n\
                                 <td></td>\n\
                                 <td>'+estilo.Codigo+'</td>\n\
                                 <td>'+estilo.nombre+'</td>\n\
                                 <td>'+estilo.descripcion+'</td>\n\
                                 </tr>';  
                        
                          $('#tblEstilos tbody').append(row);
         	    }         	            
         	  );
}

function llenarTablaTecnicas(tecnicas)
{
         var row;
    
    $(tecnicas).each(
         	    function(i , tecnica)
         	    {
                          ignorarNulosEstilo(tecnica);
                          
                          row = '<tr id='+tecnica.codigo+' class="clickable-row">\n\
                                 <td></td>\n\
                                 <td>'+tecnica.codigo+'</td>\n\
                                 <td>'+tecnica.nombre+'</td>\n\
                                 <td>'+tecnica.descripcion+'</td>\n\
                                 </tr>';  
                        
                          $('#tblTecnicas tbody').append(row);
         	    }         	            
         	  );
}

function ignorarNulosEstilo(estilo)
{
    if(estilo.descripcion == null)
       estilo.descripcion = '';
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

function iniciarPropiedadesTabla(tabla)
{
        table =   $(tabla).DataTable( {
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
    
       /*   $( "#aAct" ).click(function() {     
          cargarDatosObraEmisor(table);
      });*/
}

function cargarDatosObra()
{ 
         var columnsFixed = 1; 
         var columnsQuantity = $("table > thead > tr > th").length;
         var realColumnsQuantity = columnsQuantity - columnsFixed;       
         var obrasArray = new Array(realColumnsQuantity);       
         var nombresColumnas = ["codigo","tipo","nombre","fechaCreacion","periodo","fechaEntrada",
                                "material","valor","cantidad","estado","Autores","museo","tecnica","estilo"];
                            
         console.log("table columns: "+realColumnsQuantity);
                            
         for (i = 1; i <= realColumnsQuantity ; i++) 
         {
             obrasArray[i] = getDataColumn(i);                  
             console.log(nombresColumnas[i-1]+":"+obrasArray[i]);            
            // sessionStorage.setItem(nombresColumnas[i-1],obrasArray[i]);
         } 
         
         return obrasArray;
}

function getDataColumn(index)
{
    var data;
    
    data = $.map(table.rows('.selected').data(), function (item) {
                                   return item[index];
                    });
                    
    return data.toString();
}
