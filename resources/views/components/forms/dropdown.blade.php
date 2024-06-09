@php
use App\Models\Country;
use App\Models\City;

$text = !empty($text) ? $text : __('messages.create_land_btn');

$id = $prop['id'] ?? 'c_password';
$include_star = $prop['include_star'] ?? true;
$label = $prop['label'] ?? '';
$value = $prop['value'] ?? '';
$col = $prop['col'] ?? 3;
$data = $prop["data"] ?? "";
// by default pick the column name from the table
$key = $prop["key"] ?? "name";

if(!$data){
    switch($id){
        case config("setting.city"):
        $data = City::where("country_id", config("setting.bahmas_country_code"))->get();
        break;
        case config("setting.country"):
        $data = Country::all();
        break;
    }
}
@endphp
<div class="relative group">
    <label><span class="mr-2">{{$label}}</span></label>
    <button id="{{$id}}dropdown-button" type="button"
        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
        <label id="{{$id}}label">
            <span class="mr-2">{{$label}}</span>
        </label>
        @if ($include_star)
            {!! config('setting.red_star') !!}
        @endif
        @include("components.bottom_arrow")
    </button>
    <section id="{{$id}}loader">
        @include("components.loader")
    </section>
    <div id="{{$id}}dropdown" autocomplete="off"
        class="@If($data) max-h-52 @endif z-50 hidden overflow-y-scroll md:col-span-{{$col}} @if($move_btn_right) {{ 'text-right' }} @endif absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">
        <!-- Search input -->
        <input id="{{$id }}" name="{{$id}}" type="hidden" value="{{$value ?? ''}}" />
        <input id="{{$id }}search"
            class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none"
            type="text" placeholder="Search items" autocomplete="off">
        <!-- Dropdown content goes here -->
        @if($data)
            @foreach ($data as $record)
            <p
                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md"
                value="{{$record['id']}}">
                {{$record[$key]}}
            </p>
            @endforeach
        @endif
    </div>
    <script>
        const {{$id}}loader = $('#{{$id}}loader');
        if({{$id}}loader){
            {{$id}}loader.toggleClass("hidden");
        }
    </script>
</div>

<script>
    // JavaScript to toggle the dropdown
    const dropdownButton{{$id}} = $('#{{$id}}dropdown-button');
    const dropdownMenu{{$id}} = $("#{{$id}}dropdown");
    const searchInput{{$id}} = $('#{{$id}}search');
    let isOpen{{$id}} = false; // Set to false to open the dropdown by default

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
