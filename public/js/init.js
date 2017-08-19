$(document).ready(function(){ 
    $("#preloader").hide();
    $("#container").show();
});

(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {
    $('table.infodata').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        'bFilter':  false,
    "columnDefs": [
      {"visible" : false, "targets": 0}
    ]
    } );
} );

$(document).ready(function() {
    $('table.datatable').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false,
        'bFilter':  false,
		"columnDefs": [
			{"visible" : false, "targets": 0}
		]
    } );
} );

$( '.datepicker' ).pickadate({
})  

 $(document).ready(function() {
    $('select').material_select();
  });
