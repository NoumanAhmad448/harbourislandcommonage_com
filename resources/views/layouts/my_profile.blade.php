@extends(config('setting.body'))
@section('page-css')
@endsection
@section('content')
<form id="land_reg" enctype="multipart/form-data">
    @include(config("files.components_").'csrf')
    @include(config("files.components_").'my_profile')
</form
@endsection
