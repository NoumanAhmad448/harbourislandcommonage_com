@php
    $include_star = $include_star ?? true;
@endphp

<label for="{{config("form.email")}}">
    {{ __('messages.EmailAddress') }}@if ($include_star)
        {!! config('setting.red_star') !!}
    @endif
</label>
<input type="email" name="{{config("form.email")}}" id="{{config("form.email")}}" placeholder="{{ __('messages.EmailAddressSample') }}"
    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $email ?? '' }}" />
