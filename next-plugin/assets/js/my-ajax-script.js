jQuery(document).ready(function($) {
	$('body').on("click", ".re-reset-btn", function(e){

		var data = {
			'action': 'my_action',
			'whatever': "hello"      // We pass php values differently!
		};
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(my_ajax_object.ajax_url, data, function(response) {
			console.log(response);
			alert('Got this from the server: ' + response);
		});
	});
});