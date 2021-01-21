/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/office.js ***!
  \********************************/
$(document).ready(function () {
  /**
  |	Province change action
  |
  |
  */
  $('#province').change(function ($e) {
    $e.preventDefault();
    $.ajax({
      url: "{{ route('/region') }}",
      type: "GET",
      async: true,
      cache: false,
      error: function error($error) {
        console.log($error);
      },
      success: function success($data) {
        console.log($data);
      }
    });
  });
});
/******/ })()
;