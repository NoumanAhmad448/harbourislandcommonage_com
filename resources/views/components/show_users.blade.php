@php
$data = $prop["data"] ?? '';
$id = $prop["data"]["id"];
$en_fun = $prop["data"]["en_fun"] ?? true;

debug_logs("show_users blade component");
debug_logs($data);


@endphp


@include(config("files.components_")."loader", ["prop" => [
    "id" => $id
]])
@if ($data && $data[config("keys.users")])
    @if ($data[config("keys.title")])
        <h1> {{ $data[config("keys.title")] }} </h1>
    @endif
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-9 p-4">

    </div>

    <table class="display" id="dt{{ $id }}">
        <thead>
            <tr>
                @if(isAdmin(false))
                    <th>#</th>
                @endif
                <th>{{ __('table.' . config('table.name')) }}</th>
                <th>{{ __('table.' . config('form.email')) }}</th>
                <th>{{ __('table.' . config('table.is_active')) }}</th>
                <th>{{ __('table.' . config('table.created_at')) }}</th>
                <th>{{ __('table.' . config('table.updated_at')) }}</th>
            </tr>
        </thead>
        <tbody class="hidden" id="{{$id}}tbody">
            @if (count($data[config("keys.users")]) > 0)
                @foreach ($data[config("keys.users")] as $user)
                    <tr>
                        @if(isAdmin(false))
                            <td>
                                @include(config('files.forms') . 'checkbox', [
                                    'prop' => [
                                        'id' => "d".config('form.primary_key'),
                                        "value" => $user->id
                                    ],
                                ])
                            </td>
                        @endif
                        <td>{{ $user->name ?? 'no name' }}</td>
                        <td>{{ $user->email ?? '' }}</td>
                        <td class="text-center @if($user->deleted_at) bg-red-500 text-white @endif" >
                            {{ $user->deleted_at ? "No" : 'Yes' }}</td>
                        <td>{{ $user->created_at ?? '' }}</td>
                        <td>{{ $user->updated_at ?? '' }}</td>
                    </tr>
                @endforeach
            @endif
            @include(config("files.components_")."loader_script", ["prop" =>
            [
                'id' => $id,
                "hide_el" => "{$id}tbody"
            ]
            ])
        </tbody>
    </table>
@endif
@if($en_fun)
<script>

</script>
<script>
    let table{{$id}} = dataTable('dt{{ $id }}',{
         order : {
            col_no : 1
        }
    });
</script>
{{-- <script src="{{ mix(config('setting.sub_admins_js')) }}"></script> --}}
@endif

