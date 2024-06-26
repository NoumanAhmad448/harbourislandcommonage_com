@php
    $id = $prop['id'] ?? "sidebar_menu";
    $sidebar_menu = $prop['id'] ."sidebar_menu";
    $menu = [
        [
            'priv' => true,
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
        [
            'priv' => isSuperAdmin(false),
            'menu' => __('messages.ap'),
            'svg' => 'profile',
            'sub_menu' => [
                [
                    'url' => route('create_admin'),
                    'html' => __('messages.sub_adns'),
                ],
                [
                    'url' => route('admin_op'),
                    'html' => __('messages.admin_op'),
                ],
            ]
        ]
    ];

@endphp
@include(config("files.components").".loader", ["prop" => [
    "id" => $id
]])
<ul id="{{$sidebar_menu}}" class="mb-6 flex flex-col gap-2.5 hidden">
    <!-- Menu Item Dashboard -->
    @include('sidebar_menu_list', ["menu" => $menu])
    <!-- Dropdown Menu End -->
    <!-- Menu Item Dashboard -->
</ul>
@include(config("files.components").".loader_script", ["prop" => ['id' => $id, "hide_el" => $sidebar_menu]])
