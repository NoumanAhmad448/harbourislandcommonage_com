@extends(config('setting.admin_body'))
@section('page-css')
@include(config('files.lib')."datatables")
@endsection
@section('content')
    @php
        use Illuminate\Support\Facades\Storage;
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
                    <th >{{ __("table.".config("table.city"))}}</th>
                    <th >{{ __("table.".config("table.is_admin_approved"))}}</th>
                    <th >{{ __("table.".config("table.land_files"))}}</th>
                    <th >{{ __("table.".config("table.created_at"))}}</th>
                    <th >{{ __("table.".config("table.updated_at"))}}</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['lands']) > 0)
                    @foreach ($data['lands'] as $lands)
                        <tr >
                            <td >{{ '' }}</td>
                            <td >{{ $lands->user ? $lands->user->name : 'no name' }}</td>
                            <td >{{ $lands->title ?? ''  }}</td>
                            <td >{{ $lands->description ?? ''  }}</td>
                            <td >{{ $lands->location ?? ''  }}</td>
                            <td >{{ $lands->size ?? ''  }}</td>
                            <td >{{ $lands->city && $lands->city->name ? $lands->city->name : ''  }}</td>
                            <td class="text-white @if($lands->is_admin_approved){{"bg-blue-500" }} @else {{ "bg-red-500" }} @endif">{{ $lands->is_admin_approved ? "Yes" : 'No'  }}</td>
                            <td >
                            @if(count($lands->landFiles) > 0)
                                @foreach($lands->landFiles as $landFile)
                                    <a href="{{Storage::path($landFile->link)}}">{{$landFile->f_name}}</a><br/>
                                @endforeach
                            @endif
                            </td>
                            <td >{{ $lands->created_at ? $lands->created_at  : ''  }}</td>
                            <td >{{ $lands->updated_at ? $lands->updated_at  : '' }}</td>
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
