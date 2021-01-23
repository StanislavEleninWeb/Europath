/******/ (() => { // webpackBootstrap
/*!*****************************!*\
  !*** ./resources/js/car.js ***!
  \*****************************/
$(document).ready(function () {
  /**
  |	Office change action
  |
  |
  */
  $('#office').change(function (event) {
    event.preventDefault();
    var courier = $('#courier');
    var value = $(this).val();

    if (!$.isNumeric(value)) {
      courier.empty();
      courier.attr('disabled', 'true');
    } else {
      $.ajax({
        url: '/office/' + value + '/courier',
        type: 'GET',
        async: true,
        cache: false,
        error: function error(_error) {
          console.log($error);
        },
        success: function success(data) {
          var options = [];
          courier.removeAttr('disabled');
          courier.empty();
          var el = document.createElement('option');
          var empty = el.cloneNode(true);
          empty.text = '* Please select region';
          empty.value = '';
          options.push(empty);
          $.each(data, function (key, val) {
            var clone = el.cloneNode(true);
            clone.text = val.user.first_name;
            clone.value = val.id;
            options.push(clone);
          });
          courier.append(options);
        }
      });
    }
  });
});
/******/ })()
;