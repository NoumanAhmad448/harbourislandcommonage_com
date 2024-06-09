@php

$text = !empty($text) ? $text : __('messages.create_land_btn');

$id = $prop['id'] ?? 'c_password';
$include_star = $prop['include_star'] ?? true;
$label = $prop['label'] ?? '';
$value = $prop['value'] ?? '';
$col = $prop['col'] ?? 3;
@endphp
<div class="relative group">
    <button id="{{$id}}dropdown-button" type="button"
        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
        <label id="{{$id}}label">
            <span class="mr-2">{{$label}}</span>@if ($include_star)
            {!! config('setting.red_star') !!}
        @endif
        </label>
        @include("components.bottom_arrow")
    </button>
    <div id="{{$id}}dropdown"
        class="overflow-y-scroll md:col-span-{{$col}} @if($move_btn_right) {{ 'text-right' }} @endif absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">
        <!-- Search input -->
        <input id="{{$id }}" name="{{$id}}"
            class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none"
            type="text" placeholder="Search items" autocomplete="off">
        <!-- Dropdown content goes here -->
        <p
            class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase
        </p>
        <p href="#"
            class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">lower case
        </p>
    </div>
</div>

<script>
    // JavaScript to toggle the dropdown
    const dropdownButton{{$id}} = $('#{{$id}}dropdown-button');
    const dropdownMenu{{$id}} = $("#{{$id}}dropdown");
    const searchInput{{$id}} = $('#{{$id}}');
    let isOpen{{$id}} = false; // Set to false to open the dropdown by default

    // Set initial state
    // toggleDropdown is in common_functions.js in resource dir
    toggleDropdown(dropdownMenu{{$id}},isOpen{{$id}});

    dropdownButton{{$id}}.on('click', () => {
        // toggleDropdown is in common_functions.js in resource dir
        toggleDropdown(dropdownMenu{{$id}},isOpen{{$id}});
    });

    // Add event listener to filter items based on input
    searchInput{{$id}}.on('input', () => {
        // searchDropDown is in common_functions.js in resource dir
        searchDropDown(searchInput{{$id}},dropdownMenu{{$id}}
        )
    });
    $('#{{$id}}dropdown .dropdown-item').on('click', function() {
        $("#{{$id }}").val($(this).attr("value"));
        dropdownButton{{$id}}.click()
        $(`#{{$id}}label`).text($(this).text())
    });
    searchInput{{$id}}.on('input', () => {
        // searchDropDown is in common_functions.js in resource dir
        searchDropDown(searchInput{{$id}},dropdownMenu{{$id}}
        )
    });
</script>
