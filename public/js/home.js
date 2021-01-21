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
    var value = $(this).val();

    if (!$.isNumeric(value)) {
      region.empty();
      region.attr('disabled', 'true');
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
    $.ajax({
      url: '/region/' + $(this).val() + '/city',
      type: 'GET',
      async: true,
      cache: false,
      error: function error(_error2) {
        console.log($error);
      },
      success: function success(data) {
        console.log(data);
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
  });
});
/******/ })()
;