@extends(config('setting.body'))
@section('page-css')
<link rel="stylesheet" href="{{ mix(config('setting.land_create_css')) }}">
@endsection
@section('content')
    <form id="land_reg" enctype="multipart/form-data">
        @include(config("files.components_").'csrf')
        @include(config("files.components_").'register_land')
    </form>
@endsection
@section('script')
<script>
    let land_save = "{{route('land_save')}}";
</script>
<script src="{{ mix(config('setting.land_create_js')) }}"></script>
@endsection
