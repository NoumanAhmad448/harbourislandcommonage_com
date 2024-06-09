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
            @include('components.forms.col', ['input' => 'components.forms.field',
            "prop" => ["id" => config("setting.title"), "label" => __("messages.land_title"),
            ]])
            @include('components.forms.col', ['input' => 'components.forms.field',
            "prop" => ["id" => config("setting.description"), "label" => __("messages.land_des"),
            ]])
            @include('components.forms.col', ['input' => 'components.forms.field',
            "prop" => ["id" => config("setting.location"), "label" => __("messages.location_desc"),
            ]])
            @include('components.forms.col', ['input' => 'components.forms.field',
            "prop" => ["id" => config("setting.size"), "label" => __("messages.size_desc"),
            ]])
            @include('components.forms.col', ['input' => 'components.forms.dropdown',
            "col" => 3 , "prop" => ["id" => config("setting.city"), "label" => __("messages.city_desc"),
            ]])
            @if(config("setting.en_country"))
                @include('components.forms.col', ['input' => 'components.forms.dropdown',
                "col" => 2 , "prop" => ["col" => 2,"id" => config("setting.country"),
                "label" => __("messages.country_desc"),
                ]])
            @endif
        </div>
    </div>
</div>
