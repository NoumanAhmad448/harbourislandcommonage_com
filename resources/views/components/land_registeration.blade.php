@php

    $title = $title ?? __('messages.land_registeration');
    $desc = $desc ?? __('messages.wel_desc');
@endphp
<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3 my-4">
    <div class="text-gray-600">
        <p class="font-medium text-lg">{{ $title }}</p>
        <p>{{ $desc }}</p>
    </div>

    <div class="lg:col-span-2">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
            @include(config("files.forms").'col', ['input' => config("files.forms").'field',
            "prop" => ["id" => config("setting.title"), "label" => __("messages.land_title"),
            ]])
            @include(config("files.forms").'col', ['input' => config("files.forms").'field',
            "prop" => ["id" => config("setting.description"), "label" => __("messages.land_des"),
            ]])
            @include(config("files.forms").'col', ['input' => config("files.forms").'field',
            "prop" => ["id" => config("setting.location"), "label" => __("messages.location_desc"),
            ]])
            @include(config("files.forms").'col', ['input' => config("files.forms").'field',
            "prop" => ["id" => config("setting.size"), "label" => __("messages.size_desc"),
            ]])
            @include(config("files.forms").'col', ['input' => config("files.forms").'dropdown',
            "col" => 3 , "prop" => ["id" => config("setting.city"), "label" => __("messages.city_desc"),
            ]])
            @if(config("setting.en_country"))
                @include(config("files.forms").'col', ['input' => config("files.forms").'dropdown',
                "col" => 2 , "prop" => ["col" => 2,"id" => config("setting.country"),
                "label" => __("messages.country_desc"),
                ]])
            @endif
            @if(config("setting.en_land_reg_file"))
                @include(config("files.forms").'col', ['input' => config("files.forms").'file',
                 "prop" => ["col" => 2,"id" => config("setting.land_reg_file_upload"),
                 "include_star" => false, "label" => __("messages.file_upload_desc"),
                 "is_multiple" => config("setting.landreg_multiple"),
                ]])
            @endif
            @if(config("setting.en_gc"))
                @include(config("files.forms").'col', ['input' => config("files.forms").'captcha',
                 ])
            @endif
        </div>
    </div>
</div>
