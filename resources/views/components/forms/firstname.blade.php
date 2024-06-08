@php
$include_star = $include_star ?? true;
@endphp

<label for="first_name">{{ __('messages.FirstName') }}@if($include_star){!! config('setting.red_star') !!}@endif</label>
<input type="text" name="first_name" id="first_name" placeholder="{{ __('messages.FirstName') }}"
    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$firstname ?? ''}}" />
