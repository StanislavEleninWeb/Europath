$(document).ready(function(){

	/**
	|	Province change action
	|
	|
	*/
	$('#province').change(function($e){
		$e.preventDefault();

		const region = $('#region');
		const city = $('#city');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			region.empty();
			region.attr('disabled', 'true');
		} else {
			$.ajax({
				url: '/province/' + value + '/region',
				type: 'GET',
				async: true,
				cache: false,
				error: function(error){
					console.log($error);
				},
				success: function(data){

					let options = [];

					region.removeAttr('disabled');
					region.empty();
					
					let el = document.createElement('option');

					let empty = el.cloneNode(true);
					empty.text = '* Please select region';
					options.push(empty);

					$.each(data, function(key, val){
						let clone = el.cloneNode(true);
						clone.text = val.name;
						clone.value = val.id;
						options.push(clone);
					});

					region.append(options);
				},
			});
		}

	});

	/**
	|	Province change action
	|
	|
	*/
	$('#region').change(function($e){
		$e.preventDefault();

		const city = $('#city');

		$.ajax({
			url: '/region/' + $(this).val() + '/city',
			type: 'GET',
			async: true,
			cache: false,
			error: function(error){
				console.log($error);
			},
			success: function(data){
				console.log(data);
				let options = [];

				city.removeAttr('disabled');
				city.empty();
				
				let el = document.createElement('option');

				let empty = el.cloneNode(true);
				empty.text = '* Please select region';
				options.push(empty);

				$.each(data, function(key, val){
					let clone = el.cloneNode(true);
					clone.text = val.name;
					clone.value = val.id;
					options.push(clone);
				});

				city.append(options);
			},
		});

	});



});