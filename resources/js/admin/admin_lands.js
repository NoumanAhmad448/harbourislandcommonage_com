const update = $(`#${update_field}`)
debug_logs(update)
let lands = $(`[name='${land_ids}[]']`)
debug_logs(lands)
let land_op = $(`#${land_ops}`).val();
debug_logs(land_op)
let update_land = $(`#${update_land}`).val();
debug_logs(update_land)
let land_id = ""

update.on("click", function () {
    land_op = $(`#${land_ops}`).val();
    update_land = $(`#${update_land}`).val();
    lands = $(`[name='${land_ids}[]']`)

    if (land_op !== ""){
        debug_logs(lands)
        debug_logs(isCheckboxChecked(lands))
        if (isCheckboxChecked(lands)){
            land_id = getElValues(lands)
            debug_logs(land_id)
            $("#default-modal").toggleClass("hidden")
        } else {
            popup_message("Please select atleast one Land to apply operation");
        }
    } else {
        popup_message('Please choose the Land Operation');
    }
});

update_land.on("click", ()=> {
    // showLoader
    const loading_screen = showLoader()
    update.prop("disabled","disabled")

    $.ajax({
        type: 'post',
        url: '{{route("change_course_status")}}',
        dataType: 'json',
        data: { 'land_ids': land_ids, 'status': status }
        , success: d => {
            update.prop("disabled","")
            loading_screen.toggleClass("hidden")
            popup_message(d);
            location.reload();
        }, error: d => {
            update.prop("disabled","")
            loading_screen.toggleClass("hidden")
            popup_message(d)
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
})