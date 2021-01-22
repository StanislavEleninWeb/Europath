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
	$('#region').change(function($e){
		$e.preventDefault();

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
	$('#city').change(function($e){
		$e.preventDefault();

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
	$('#office').change(function($e){
		$e.preventDefault();

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

						office_td_phones.innerHTML = data.phones;
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
							courier_td_car.innerHTML = val.car;
							courier_td_phone.innerHTML = val.phones;

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



});