@php

$text = !empty($text) ? $text : __('messages.create_land_btn');

$id = $prop['id'] ?? 'c_password';
$include_star = $prop['include_star'] ?? true;
$label = $prop['label'] ?? '';
$value = $prop['value'] ?? '';

@endphp
<div class="relative group">
    <button id="{{$id}}dropdown-button" type="button"
        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
        <span class="mr-2">{{$label}}</span>@if ($include_star)
            {!! config('setting.red_star') !!}
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div id="{{$id}}dropdown"
        class="hidden absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">
        <!-- Search input -->
        <input id="{{$id }}" name="{{$id}}"
            class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none"
            type="text" placeholder="Search items" autocomplete="off">
        <!-- Dropdown content goes here -->
        <a href="#"
            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase
        </a>
        <a href="#"
            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">lower case
        </a>
    </div>
</div>

<script>
    // JavaScript to toggle the dropdown
    const dropdownButton{{$id}} = document.getElementById('{{$id}}dropdown-button');
    const dropdownMenu{{$id}} = document.getElementById("{{$id}}dropdown");
    const searchInput{{$id}} = document.getElementById('{{$id}}');
    let isOpen{{$id}} = true; // Set to true to open the dropdown by default

    // Function to toggle the dropdown state
    function toggleDropdown() {
        isOpen{{$id}} = !isOpen{{$id}};
        dropdownMenu{{$id}}.classList.toggle('hidden', !isOpen{{$id}});
    }

    // Set initial state
    toggleDropdown();

    dropdownButton{{$id}}.addEventListener('click', () => {
        toggleDropdown();
    });

    // Add event listener to filter items based on input
    searchInput{{$id}}.addEventListener('input', () => {
        const searchTerm{{$id}} = searchInput{{$id}}.value.toLowerCase();
        const items{{$id}} = dropdownMenu{{$id}}.querySelectorAll('a');

        items{{$id}}.forEach((item) => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
