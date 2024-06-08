@php
    $text = !empty($text) ? $text : __('messages.create_land_btn');

    $id = $prop['id'] ?? 'c_password';
    $include_star = $prop['include_star'] ?? true;
    $label = $prop['label'] ?? '';
    $form_type = $prop['type'] ?? 'text';
    $value = $prop['value'] ?? '';
    $placeholder = $prop['placeholder'] ?? $label;

@endphp
<label for="{{ $id }}">
    {{ $label }}@if ($include_star)
        {!! config('setting.red_star') !!}
    @endif
</label>
<input type="{{ $form_type }}" name="{{ $id }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $value ?? '' }}" />
