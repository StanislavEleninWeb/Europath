$(document).ready(function(){

	/**
	|	Office change action
	|
	|
	*/
	$('#office').change(function(event){
		event.preventDefault();

		const courier = $('#courier');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			courier.empty();
			courier.attr('disabled', 'true');
		} else {

			$.ajax({
				url: '/office/' + value + '/courier',
				type: 'GET',
				async: true,
				cache: false,
				error: function(error){
					console.log($error);
				},
				success: function(data){

					let options = [];

					courier.removeAttr('disabled');
					courier.empty();
					
					let el = document.createElement('option');

					let empty = el.cloneNode(true);
					empty.text = '* Please select region';
					empty.value = '';
					options.push(empty);

					$.each(data, function(key, val){
						let clone = el.cloneNode(true);
						clone.text = val.user.first_name;
						clone.value = val.id;
						options.push(clone);
					});

					courier.append(options);
				},
			});

		}
	});

});