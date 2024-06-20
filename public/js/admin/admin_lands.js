/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/admin/admin_lands.js ***!
  \*******************************************/
$("#".concat(update_field)).on("click", function () {
  var status = $("#".concat(land_ops)).val();
  if (status !== "") {
    land_ids = $("#".concat(land_ids)).val();
    debug_logs(land_ids);
    if (land_ids !== "") {
      $.ajax({
        type: 'post',
        url: '{{route("change_course_status")}}',
        dataType: 'json',
        data: {
          'land_ids': land_ids,
          'status': status,
          '_token': '{{csrf_token()}}'
        },
        success: function success(d) {
          show_message(d);
          location.reload();
        },
        error: function error(d) {
          errors = JSON.parse(d.responseText)['errors'];
          console.log(errors);
        }
      });
    } else {
      show_message("Please select a course");
    }
  } else {
    show_message('Please choose the status');
  }
});
/******/ })()
;