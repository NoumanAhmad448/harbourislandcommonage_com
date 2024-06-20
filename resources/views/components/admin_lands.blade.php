@php
$data = $prop["data"] ?? '';
$id = $prop["data"]["id"];
$en_fun = $prop["data"]["en_fun"] ?? true;

debug_logs("admin blade component");
debug_logs($data);

@endphp
@include(config("files.components_")."loader", ["prop" => [
    "id" => $id
]])
@if ($data && $data['lands'])
    @if ($data['title'])
        <h1> {{ $data['title'] }} </h1>
    @endif
    @if($en_fun && count($data['lands']))
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 p-4">
        @include(config("files.forms").'three_col', ['input' =>
        config("files.forms")."dropdown",
        "prop" => [
            "id" => config("form.land_ops"),
            "include_star" => false,
            "label" => __("messages.land_op"),
            "data" => [
                [
                "id" => 1,
                "name" => "value"
                ]
            ],
        ]
        ]
        )
        @include(config("files.forms").'two_col', [
            'input' => config("files.forms")."submit",
            "text" => __("attributes.update"),
            "id" => config("form.update"),
            "classes" => "pt-5",
        ])
    </div>
    @endif
    <table class="display" id="{{ $id }}">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('table.' . config('table.user')) }}</th>
                <th>{{ __('table.' . config('table.title')) }}</th>
                <th>{{ __('table.' . config('table.description')) }}</th>
                <th>{{ __('table.' . config('table.location')) }}</th>
                <th>{{ __('table.' . config('table.size')) }}</th>
                <th>{{ __('table.' . config('table.city')) }}</th>
                <th>{{ __('table.' . config('table.is_admin_approved')) }}</th>
                @if (config('setting.en_slf'))
                    <th>{{ __('table.' . config('table.land_files')) }}</th>
                @endif
                <th>{{ __('table.' . config('table.created_at')) }}</th>
                <th>{{ __('table.' . config('table.updated_at')) }}</th>
            </tr>
        </thead>
        <tbody class="hidden" id="{{$id}}tbody">
            @if (count($data['lands']) > 0)
                @foreach ($data['lands'] as $lands)
                    <tr>
                        <td>
                            @include(config('files.forms') . 'checkbox', [
                                'prop' => [
                                    'id' => config('form.land_ids'),
                                ],
                            ])
                        </td>
                        <td>{{ $lands->user ? $lands->user->name : 'no name' }}</td>
                        <td>{{ $lands->title ?? '' }}</td>
                        <td>{{ $lands->description ?? '' }}</td>
                        <td>{{ $lands->location ?? '' }}</td>
                        <td>{{ $lands->size ?? '' }}</td>
                        <td>{{ $lands->city && $lands->city->name ? $lands->city->name : '' }}</td>
                        <td
                            class="text-white @if ($lands->is_admin_approved) {{ 'bg-blue-500' }} @else {{ 'bg-red-500' }} @endif">
                            {{ $lands->is_admin_approved ? 'Yes' : 'No' }}</td>
                        @if (config('setting.en_slf'))
                            <td>
                                @if (count($lands->landFiles) > 0)
                                    @foreach ($lands->landFiles as $landFile)
                                        <a target="_blank" class="no-underline hover:underline"
                                            href="{{ file_path($landFile->link) }}">{{ $landFile->f_name }}</a>
                                        <br /><br />
                                    @endforeach
                                @endif
                            </td>
                        @endif
                        <td>{{ $lands->created_at ? $lands->created_at : '' }}</td>
                        <td>{{ $lands->updated_at ? $lands->updated_at : '' }}</td>
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
    let land_ids = "{{ config('form.land_ids') }}";
    let update_field = "{{ config('form.update') }}";
    let land_ops = "{{ config('form.land_ops') }}";
</script>
<script src="{{ mix(config('setting.admin_lands_js')) }}"></script>
@endif

