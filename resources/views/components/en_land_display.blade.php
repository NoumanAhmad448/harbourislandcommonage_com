@if (config('setting.en_land_display'))
    <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400
                rounded shadow">
        <a href="{{ route('land_create') }}">Land</a>
    </button>
@endif
