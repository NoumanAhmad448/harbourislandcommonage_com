/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/admin/show_users.js ***!
  \******************************************/
var update = $("#".concat(update_field));
debug_logs(update);
var users = $("[name='".concat(user_ids, "[]']"));
debug_logs(users);
debug_logs("del_form => ".concat(del_form));
debug_logs("land_update => ".land_update);
debug_logs("update_form => ".update_form);
debug_logs("user_update => ".user_update);
var user_id = "";
$("#".concat(crte_admn)).on(CLICK_EVENT, function () {
  debug_logs("inside the ".concat(crte_admn, " ").concat(CLICK_EVENT, " event"));
  $("#".concat(crtr_admn_mdl)).toggleClass("hidden");
  var update_params = {};
  update_params["url"] = crte_admin_url;
  update_params["el"] = user_reg;
  update_params['dis_el'] = update;
  successCall = function successCallback(d) {
    location.reload();
  };
  errCall = function errCall(d) {
    debug_logs(d);
  };
  formSubmit(update_params, successCall, errCall);
});
update.on(CLICK_EVENT, function () {
  // showLoader
  var loading_screen = showLoader();
  admn_op_in = $("#".concat(admn_op)).val();
  users = $("[name='".concat(user_ids, "[]']"));
  checked_users = $("[name='".concat(user_ids, "[]']:checked"));
  debug_logs("before admn_op=> ".concat(admn_op_in));
  if (admn_op_in !== "" && admn_op_in != undefined) {
    debug_logs(users);
    debug_logs(isCheckboxChecked(users));
    if (isCheckboxChecked(users)) {
      user_id = getElValues(checked_users);
      debug_logs(user_id);
      debug_logs("admn_op => ".concat(admn_op_in));
      if (admn_op_in == 1) {
        debug_logs("users_ids => ".concat(users_ids));
        $("#".concat(del_form, " #").concat(users_ids)).val(user_id);
        // form request
        var params = {};
        params["url"] = user_del;
        params["el"] = del_form;
        params['dis_el'] = update;
        var _successCall = function successCallback(d) {
          location.reload();
        };
        var _errCall = function errCall(d) {
          debug_logs(d);
        };
        formSubmit(params, _successCall, _errCall);
        // form request closed
        $("#".concat(del_form)).submit();
      } else if (admn_op_in == 2) {
        $("#default-modal").toggleClass("hidden");
        $("#".concat(update_form, " #").concat(users_ids)).val(user_id);
      }
    } else {
      popup_message("Please select atleast one user to apply operation");
    }
  } else {
    popup_message('Please choose the User Operation');
  }
  loading_screen.toggleClass("hidden");
});
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