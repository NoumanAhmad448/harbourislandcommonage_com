@extends(config('setting.admin_body'))
@section('page-css')
@endsection
@section('content')
    @php
        $id = gen_str();
    @endphp
    @if ($data && $data['lands'] && count($data['lands']) > 0)
        @if($data['title'])
            <h1> {{ $data['title'] }} </h1>
        @endif
        <table class="table-auto" id="{{ $id }}">
            <thead>
                <tr>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['lands'] as $lands)
                    <tr>
                        <th>{{ $lands->title }}</th>
                        <th>Artist</th>
                        <th>Year</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
@section('script')
<script>
    let table{{ $id }} = dataTable('{{ $id }}');
</script>
@endsection
