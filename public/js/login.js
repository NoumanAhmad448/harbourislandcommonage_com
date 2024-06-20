/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
$("#login").submit(function (e) {
  e.preventDefault();
  var loading_screen = $("#loading-screen");
  var data = new FormData($(this).get(0));
  if (debug) {
    console.log(data);
  }
  // disable submit btn and show loader
  debug_logs("loading_screen");
  debug_logs(loading_screen);
  loading_screen.toggleClass("hidden");
  var submit = $("#submit");
  submit.prop("disabled", "disabled");
  // disable submit btn and show loader
  $.ajax({
    url: login_form,
    type: 'post',
    contentType: false,
    processData: false,
    data: data,
    success: function success(d) {
      submit.prop("disabled", "");
      loading_screen.toggleClass("hidden");
      popup_message(d);
      changeURL("".concat(index));
    },
    error: function error(d) {
      submit.prop("disabled", "");
      loading_screen.toggleClass("hidden");
      popup_message(d);
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'JSON'
  });
});
/******/ })()
;