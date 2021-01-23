$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	/**
	|	Province change action
	|
	|
	*/
	$('#province').change(function(event){
		event.preventDefault();

		const region = $('#region');
		const city = $('#city');
		const office = $('#office');
		const office_container = $('#office_container');
		const courier_container = $('#courier_container');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			region.empty();
			region.attr('disabled', 'true');
			city.empty();
			city.attr('disabled', 'true');
			office.empty();
			office.attr('disabled', 'true');
			office_container.empty();
			courier_container.empty();
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
	$('#region').change(function(event){
		event.preventDefault();

		const city = $('#city');
		const office = $('#office');
		const office_container = $('#office_container');
		const courier_container = $('#courier_container');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			city.empty();
			city.attr('disabled', 'true');
			office.empty();
			office.attr('disabled', 'true');
			office_container.empty();
			courier_container.empty();
		} else {

			$.ajax({
				url: '/region/' + value + '/city',
				type: 'GET',
				async: true,
				cache: false,
				error: function(error){
					console.log($error);
				},
				success: function(data){

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

		}
	});

	/**
	|	Office change action
	|
	|
	*/
	$('#city').change(function(event){
		event.preventDefault();

		const office = $('#office');
		const office_container = $('#office_container');
		const courier_container = $('#courier_container');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			office.empty();
			office.attr('disabled', 'true');
			office_container.empty();
			courier_container.empty();
		} else {

			$.ajax({
				url: '/city/' + value + '/office',
				type: 'GET',
				async: true,
				cache: false,
				error: function(error){
					console.log($error);
				},
				success: function(data){
					
					let options = [];

					office.removeAttr('disabled');
					office.empty();
					
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

					office.append(options);
				},
			});

		}
	});

	/**
	|	Office change action
	|
	|
	*/
	$('#office').change(function(event){
		event.preventDefault();

		const office_container = $('#office_container');
		const courier_container = $('#courier_container');
		const value = $(this).val();

		if(!$.isNumeric(value)){
			office_container.empty();
			courier_container.empty();
		} else {

			$.ajax({
				url: '/office/' + value,
				type: 'GET',
				async: true,
				cache: false,
				error: function(error){
					console.log($error);
				},
				success: function(data){
					office_container.empty();
					courier_container.empty();

					if(!$.isEmptyObject(data)){

						// Create element
						let options_courier = [];
						let tr = document.createElement('tr');
						let td = document.createElement('td');

						let office_tr = tr.cloneNode(true);
						let office_td_phones = td.cloneNode(true);
						let office_td_address = td.cloneNode(true);
						let office_td_opening_hours = td.cloneNode(true);

						$.each(data.phones, function(key, val){
							office_td_phones.append(val.phone + '<br />');
						});
						office_td_address.innerHTML = data.address;
						office_td_opening_hours.innerHTML = data.opening_hours;

						office_tr.append(office_td_phones);
						office_tr.append(office_td_address);
						office_tr.append(office_td_opening_hours);

						office_container.append(office_tr);

						$.each(data.couriers, function(key, val){

							let courier_tr = tr.cloneNode(true);
							let courier_td_name = td.cloneNode(true);
							let courier_td_car = td.cloneNode(true);
							let courier_td_phone = td.cloneNode(true);

							courier_td_name.innerHTML = val.user.first_name + ' ' + val.user.last_name;
							$.each(val.car, function(k, v){
								courier_td_car.append(v.brand + ' ' + v.model + ' ' + v.registration + '<br />');
							});
							$.each(val.phones, function(k, v){
								courier_td_phone.append(v.phone + '<br />');
							});

							courier_tr.append(courier_td_name);
							courier_tr.append(courier_td_car);
							courier_tr.append(courier_td_phone);

							// Push table row
							options_courier.push(courier_tr);
						});

						courier_container.append(options_courier);
					}
				},
			});

		}
	});


	/**
	|	Province change action
	|
	|
	*/
	$('#uuid_autocomplete').on('input', function(event){
		event.preventDefault();

		let value = $(this).val();

		$(this).autocomplete({
			minLength: 3,
			source: function(request, response){
				$.ajax({
		          type: 'POST',
		          url: '/courier/uuid/autocomplete',
		          async: true,
		          cache: false,
		          dataType: "json",
		          data: {
		          	data: value,
		          },
		          success: function(data) {
		            response($.map(data, function(itr){
		            	return {
		            		label: itr.uuid,
		            		value: itr.uuid,
		            	};
		            }));
		          }
		        });
			},
		});

	});

	$('#uuid_form').on('submit', function(event){
		event.preventDefault();

		let input = $('#uuid_autocomplete');

		$.ajax({
          type: 'GET',
          url: '/courier/uuid/' + input.val(),
          async: true,
          cache: false,
          dataType: "json",
          success: function(data) {
            input.val('');

			let td = document.createElement('td');

            let courier_tr = document.createElement('tr');
			let courier_td_name = td.cloneNode(true);
			let courier_td_car = td.cloneNode(true);
			let courier_td_phone = td.cloneNode(true);

			courier_td_name.innerHTML = data.user.first_name + ' ' + data.user.last_name;
			$.each(data.car, function(key, val){
				courier_td_car.append(val.brand + ' ' + val.model + ' ' + val.registration + '<br />');
			});
			$.each(data.phones, function(key, val){
				courier_td_phone.append(val.phone + '<br />');
			});

			courier_tr.append(courier_td_name);
			courier_tr.append(courier_td_car);
			courier_tr.append(courier_td_phone);

			$('#uuid_autocomplete_container').append(courier_tr);
          }
        });
	});


});