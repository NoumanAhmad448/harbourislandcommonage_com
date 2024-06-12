@php
$text = !empty($text) ? $text : __("messages.create_land_btn");
$id = $id ?? "submit";
@endphp

<div class="inline-flex items-end">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    id={{$id}}
    >
        @include(config("files.components").".right_arrow"){!! $text !!}
    </button>
</div>
