@php
    $id = $prop['id'] ?? "sidebar_menu";
    $sidebar_menu = $prop['id'] ."sidebar_menu";
    $menu = [
        [
            'menu' => __('messages.dashboard'),
            'svg' => 'dashboard',
            'sub_menu' => [
                [
                    'url' => route('admin_chart'),
                    'html' => __('messages.summary'),
                ],
                [
                    'url' => route('admin_lands'),
                    'html' => __('messages.lands'),
                ],
            ],
        ],
    ];

@endphp
<section id="{{$id}}loader">
    @include(config("files.components").".loader")
</section>
<ul id="{{$sidebar_menu}}" class="mb-6 flex flex-col gap-2.5 hidden">
    <!-- Menu Item Dashboard -->
    @foreach ($menu as $op)
        <li>
            <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                href="#"
                @click.prevent="selected = (selected === '{{ $op['menu'] }}' ? '':
                    '{{ $op['menu'] }}')"
                :class="{ 'bg-graydark dark:bg-meta-4': (selected === '{{ $op['menu'] }}') }">
                @include(config('files.svg') . $op['svg'])

                {{ $op['menu'] }}
                @include(config('files.components') . '.angle_svg', [
                    'prop' => [
                        'dropdownOpen' => "selected === '" . $op['menu'] . "'",
                        'classes' => 'absolute right-4 top-1/2 -translate-y-1/2',
                    ],
                ])
            </a>
            @if (count($op['sub_menu']) > 0)
                @foreach ($op['sub_menu'] as $sub_menu)
                    <!-- Dropdown Menu Start -->
                    <div class="translate transform overflow-hidden"
                        :class="(selected === '{{ $op['menu'] }}') ? 'block' : 'hidden'">
                        <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium
                                text-bodydark2 duration-300 ease-in-out"
                                    href="{{ $sub_menu['url'] }}">{{ $sub_menu['html'] }}
                                </a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif
        </li>
    @endforeach
    <!-- Dropdown Menu End -->
    <!-- Menu Item Dashboard -->
</ul>
@include(config("files.components").".loader_script", ["prop" => ['id' => $id, "hide_el" => $sidebar_menu]])
