
(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {

    $("#preloader").hide();
    $("#container").show();

    $('select').material_select();

    $('table.datatable').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false,
        'bFilter':  false,
        "columnDefs": [
            {"visible" : false, "targets": 0}
        ]
    } );
        
    $( '.datepicker' ).pickadate({

    }) 

    $('table.infodata').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        'bFilter':  false,
    "columnDefs": [
      {"visible" : false, "targets": 0}
    ]

    } );
});

$('#editable').editableTableWidget({
    cloneProperties: ['background', 'border', 'outline']
});

