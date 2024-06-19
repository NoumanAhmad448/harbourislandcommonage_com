@php

$id = $prop['id'] ?? '';
$hide_el = $prop['hide_el'] ?? 'default';
debug_logs($id);
@endphp

<script>

    const {{$id}}loader = $('#{{$id}}loader');
    const {{$id}}hide_el = $('#{{$hide_el}}');
    if({{$id}}loader){
        {{$id}}loader.toggleClass("hidden");
    }
    if({{$id}}hide_el.length){
        {{$id}}hide_el.removeClass("hidden")
    }
    if(debug){
        console.log("loader id: "+'#{{$id}}')
    }
</script>
