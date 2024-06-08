@php
    $include_star = $include_star ?? true;
@endphp

<label for="email">
    {{ __('messages.EmailAddress') }}@if ($include_star)
        {!! config('setting.red_star') !!}
    @endif
</label>
<input type="email" name="email" id="email" placeholder="{{ __('messages.EmailAddressSample') }}"
    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $email ?? '' }}" />
