@php
    $id = 'billing_same';
    $text = $text ?? '';
@endphp
<div class="inline-flex items-center">
    <input type="checkbox" name="{{ $id }}" id="{{ $id }}" class="form-checkbox" />
    <label for="{{ $id }}" class="ml-2">{!! $text !!}</label>
</div>
