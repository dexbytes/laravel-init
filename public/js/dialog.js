$().ready(function() {
var theme_color = $('meta[name="theme"]').attr('color');

$('.confirm-delete').on('click', function(e) {
	$.confirm({
	    title: $(this).data("heading"),
	    content: $(this).data("content"),
	   // autoClose: 'cancelAction|8000',
	    type: theme_color,
    	 typeAnimated: true,
	    buttons: {
	        deleteUser: {
	            text: $(this).data("button-text") ,
	            btnClass: 'btn-blue',
	            Url: $(this).data('url'),
	            id: $(this).attr('id'),
	            action: function (e) { 
	            	console.log(e, e);
	               $.ajax({
                           type: "DELETE",
                           headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           url: e.Url,
                           data: {
                           		id: e.id,
                           		_method: 'DELETE',
                           		_token : $('meta[name="csrf-token"]').attr('content')
                       		},
                       		dataType: "JSON",
                           success: function( data ) {                
                              window.location.reload();   
                          },
                          error: function(jqXHR, textStatus, errorThrown) {
                           alert(textStatus + ' - '+ jqXHR.statusText);
                        }
                    });
	            }
	        },
	        cancelAction: function () {
	            //$.alert('action is canceled');
	        }
	    }
	});
});

})