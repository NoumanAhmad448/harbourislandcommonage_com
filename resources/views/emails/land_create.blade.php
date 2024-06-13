@component('mail::message')
# Hello {{$name}}

@include(config("files.components").".create_land_var")

{{ __("mail.land_create_body",["title" => $land_create->title,
    "location" => $land_create->location,
    "description" => $land_create->description,
    "size" => $land_create->size,
    ])
}}

{{ config('app.name') }}
@endcomponent
