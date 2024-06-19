@extends(config('setting.admin_body'))
@section('page-css')
@include(config('files.lib')."datatables")
@endsection
@section('content')
    @php
        $id = gen_str();
    @endphp
    @if ($data && $data['lands'])
        @if($data['title'])
            <h1> {{ $data['title'] }} </h1>
        @endif
        <table class="display" id="{{ $id }}">
            <thead >
                <tr >
                    <th >#</th>
                    <th >{{ __("table.".config("table.user"))}}</th>
                    <th >{{ __("table.".config("table.title"))}}</th>
                    <th >{{ __("table.".config("table.description"))}}</th>
                    <th >{{ __("table.".config("table.location"))}}</th>
                    <th >{{ __("table.".config("table.size"))}}</th>
                    <th >{{ __("table.".config("table.is_admin_approved"))}}</th>
                    <th >{{ __("table.".config("table.created_at"))}}</th>
                    <th >{{ __("table.".config("table.updated_at"))}}</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['lands']) > 0)
                    @foreach ($data['lands'] as $lands)
                        <tr >
                            <th >{{ '' }}</th>
                            <th >{{ $lands->user ? $lands->user->name : 'no name' }}</th>
                            <th >{{ $lands->title ?? ''  }}</th>
                            <th >{{ $lands->description ?? ''  }}</th>
                            <th >{{ $lands->location ?? ''  }}</th>
                            <th >{{ $lands->size ?? ''  }}</th>
                            <th class="text-white @if($lands->is_admin_approved){{"bg-blue-500" }} @else {{ "bg-red-500" }} @endif">{{ $lands->is_admin_approved ? "Yes" : 'No'  }}</th>
                            <th >{{ $lands->created_at ? $lands->created_at  : ''  }}</th>
                            <th >{{ $lands->updated_at ? $lands->updated_at  : '' }}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    @endif
@endsection
@section('script')

<script>
    let table{{ $id }} = dataTable('{{ $id }}');
</script>
@endsection
