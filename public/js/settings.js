/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/settings.js ***!
  \**********************************/
debug_logs("update_form => ".update_form);
debug_logs("user_update => ".user_update);
var update = $("#".concat(update_field));
var update_params = {};
update_params["url"] = user_update;
update_params["el"] = update_form;
update_params['dis_el'] = update;
successCall = function successCallback(d) {
  location.reload();
};
errCall = function errCall(d) {
  debug_logs(d);
};
formSubmit(update_params, successCall, errCall);
/******/ })()
;