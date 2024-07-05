/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/my_profile.js ***!
  \************************************/
var params = {};
params["url"] = profile_url;
params["el"] = my_profile_form;
params['dis_el'] = $("#".concat(submit_button));
var successCall = function successCallback(d) {
  location.reload();
};
var errCall = function errCall(d) {
  debug_logs(d);
};
formSubmit(params, successCall, errCall);
/******/ })()
;