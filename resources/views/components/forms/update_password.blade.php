<form id="update_password" enctype="multipart/form-data">
    @include(config("files.components_").'csrf')
    @include(config("files.components_").'form_type')
    @include(config("files.forms").'three_col', ['input' => config("files.forms").'password'])
    @include(config("files.forms").'field',[
        "prop" => [
            "type" => "hidden", "id" => config("table.primary_key"),
    ]])
   @include(config('files.forms').'col', [
        'input' => config('files.forms') . 'submit',
        'move_btn_right' => true,
        "id" => config("form.submit"),
        "text" => __("messages.SubmitButton"),
        "classes" => "mt-5"
    ])
</form>