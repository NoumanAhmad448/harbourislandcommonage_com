@extends(config('setting.body'))
@section('page-css')
<link rel="stylesheet" href="{{ url(config('setting.land_create_css')) }}">
@endsection
@section('content')
    @include('session_msg')
    <form id="land_reg" enctype="multipart/form-data">
        @csrf
        @include('components.register_land')
    </form>
@endsection
@section('script')
<script>
    let land_save = "{{route('land_save')}}";
</script>
<script src="{{ url(config('setting.land_create_js')) }}"></script>
@endsection
