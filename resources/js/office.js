$(document).ready(function(){

	/**
	|	Province change action
	|
	|
	*/
	$('#province').change(function($e){
		$e.preventDefault();

		$.ajax({
			url: "{{ route('/region') }}",
			type: "GET",
			async: true,
			cache: false,
			error: function($error){
				console.log($error);
			},
			success: function($data){
				console.log($data);
			},
		});
	});


});