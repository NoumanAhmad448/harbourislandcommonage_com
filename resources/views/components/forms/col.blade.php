@php
$move_btn_right = $move_btn_right ?? true;
$col = $col ?? 5;
@endphp
<div class="md:col-span-{{$col}} @if($move_btn_right) {{ 'text-right' }} @endif">
    @include($input, ["text" => $text ?? ''])
</div>
