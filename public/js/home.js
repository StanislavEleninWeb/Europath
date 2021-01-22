/******/ (() => { // webpackBootstrap
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
$(document).ready(function () {
  /**
  |	Province change action
  |
  |
  */
  $('#province').change(function ($e) {
    $e.preventDefault();
    var region = $('#region');
    var city = $('#city');
    var office = $('#office');
    var office_container = $('#office_container');
    var courier_container = $('#courier_container');
    var value = $(this).val();

    if (!$.isNumeric(value)) {
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
        error: function error(_error) {
          console.log($error);
        },
        success: function success(data) {
          var options = [];
          region.removeAttr('disabled');
          region.empty();
          var el = document.createElement('option');
          var empty = el.cloneNode(true);
          empty.text = '* Please select region';
          options.push(empty);
          $.each(data, function (key, val) {
            var clone = el.cloneNode(true);
            clone.text = val.name;
            clone.value = val.id;
            options.push(clone);
          });
          region.append(options);
        }
      });
    }
  });
  /**
  |	Province change action
  |
  |
  */

  $('#region').change(function ($e) {
    $e.preventDefault();
    var city = $('#city');
    var office = $('#office');
    var office_container = $('#office_container');
    var courier_container = $('#courier_container');
    var value = $(this).val();

    if (!$.isNumeric(value)) {
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
        error: function error(_error2) {
          console.log($error);
        },
        success: function success(data) {
          var options = [];
          city.removeAttr('disabled');
          city.empty();
          var el = document.createElement('option');
          var empty = el.cloneNode(true);
          empty.text = '* Please select region';
          options.push(empty);
          $.each(data, function (key, val) {
            var clone = el.cloneNode(true);
            clone.text = val.name;
            clone.value = val.id;
            options.push(clone);
          });
          city.append(options);
        }
      });
    }
  });
  /**
  |	Office change action
  |
  |
  */

  $('#city').change(function ($e) {
    $e.preventDefault();
    var office = $('#office');
    var office_container = $('#office_container');
    var courier_container = $('#courier_container');
    var value = $(this).val();

    if (!$.isNumeric(value)) {
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
        error: function error(_error3) {
          console.log($error);
        },
        success: function success(data) {
          var options = [];
          office.removeAttr('disabled');
          office.empty();
          var el = document.createElement('option');
          var empty = el.cloneNode(true);
          empty.text = '* Please select region';
          options.push(empty);
          $.each(data, function (key, val) {
            var clone = el.cloneNode(true);
            clone.text = val.name;
            clone.value = val.id;
            options.push(clone);
          });
          office.append(options);
        }
      });
    }
  });
  /**
  |	Office change action
  |
  |
  */

  $('#office').change(function ($e) {
    $e.preventDefault();
    var office_container = $('#office_container');
    var courier_container = $('#courier_container');
    var value = $(this).val();

    if (!$.isNumeric(value)) {
      office_container.empty();
      courier_container.empty();
    } else {
      $.ajax({
        url: '/office/' + value,
        type: 'GET',
        async: true,
        cache: false,
        error: function error(_error4) {
          console.log($error);
        },
        success: function success(data) {
          office_container.empty();
          courier_container.empty();

          if (!$.isEmptyObject(data)) {
            // Create element
            var options_courier = [];
            var tr = document.createElement('tr');
            var td = document.createElement('td');
            var office_tr = tr.cloneNode(true);
            var office_td_phones = td.cloneNode(true);
            var office_td_address = td.cloneNode(true);
            var office_td_opening_hours = td.cloneNode(true);
            office_td_phones.innerHTML = data.phones;
            office_td_address.innerHTML = data.address;
            office_td_opening_hours.innerHTML = data.opening_hours;
            office_tr.append(office_td_phones);
            office_tr.append(office_td_address);
            office_tr.append(office_td_opening_hours);
            office_container.append(office_tr);
            $.each(data.couriers, function (key, val) {
              var courier_tr = tr.cloneNode(true);
              var courier_td_name = td.cloneNode(true);
              var courier_td_car = td.cloneNode(true);
              var courier_td_phone = td.cloneNode(true);
              courier_td_name.innerHTML = val.user.first_name + ' ' + val.user.last_name;
              courier_td_car.innerHTML = val.car;
              courier_td_phone.innerHTML = val.phones;
              courier_tr.append(courier_td_name);
              courier_tr.append(courier_td_car);
              courier_tr.append(courier_td_phone); // Push table row

              options_courier.push(courier_tr);
            });
            courier_container.append(options_courier);
          }
        }
      });
    }
  });
});
/******/ })()
;