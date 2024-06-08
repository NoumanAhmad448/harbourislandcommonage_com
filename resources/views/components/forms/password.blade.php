@php
    $text = !empty($text) ? $text : __('messages.create_land_btn');
    $id = $id ?? "password";
    $include_star = $include_star ?? true;

@endphp
<label for="{{$id}}">
    {{ __('messages.password') }}@if ($include_star)
        {!! config('setting.red_star') !!}
    @endif
</label>
<input type="password" name="{{$id}}" id="{{$id}}" placeholder="{{ __('messages.password') }}"
    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $password ?? '' }}" />
