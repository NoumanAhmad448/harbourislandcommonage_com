@php

$id = $prop['id'] ?? '';
// dump($id);

@endphp

<script>

    const {{$id}}loader = $('#{{$id}}loader');
    if({{$id}}loader){
        {{$id}}loader.toggleClass("hidden");
    }
    if(debug){
        console.log("loader id: "+'#{{$id}}')
    }
</script>
