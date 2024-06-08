@php
$text = !empty($text) ? $text : __("messages.create_land_btn");
@endphp

<div class="inline-flex items-end">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {!! $text !!}
    </button>
</div>
