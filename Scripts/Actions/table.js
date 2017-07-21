        $(document).ready(function() {
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
    
    $( "#btnAction" ).click(function() {
          
      });
           } );