@extends(config('setting.admin_body'))
@section('page-css')
@include(config('files.lib')."data_tables")
@endsection
@section('content')
    @php
        use Illuminate\Support\Facades\Storage;
        $id = gen_str();
        $data["id"] = $id;
    @endphp
   @include(config('files.components_')."admin_lands", [
    "prop" => [
        "data" => $data
    ]
   ])
@endsection
@section('script')

<script>
    let table{{ $id }} = dataTable('{{ $id }}');
</script>
@endsection
