@php
$data = $prop["data"] ?? '';
$id = $prop["data"]["id"];

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
    <table class="display hidden" id="{{ $id }}">
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
        <tbody>
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
                "hide_el" => $id
            ]
            ])
        </tbody>
    </table>
@endif

