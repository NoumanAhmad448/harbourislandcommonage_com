@php
    $user = auth()->user();
    $logout_url = $prop['logout_url'] ?? route('admin_logout');
@endphp
@if ($user)
    <!-- User Area -->
    <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
        <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
            <span class="hidden text-right lg:block">
                <span class="block text-sm font-medium text-black dark:text-white">{{ $user->name }}</span>
                <span class="block text-xs font-medium">{{ isAdmin(false) ? __('messages.admin') : '' }}</span>
            </span>

            <span class="h-12 w-12 rounded-full">
                <img class="rounded-full object-contain hover:object-scale-down w-96" src="@include('modals.profile_logo')"
                    alt="{{ $user->name }}" />
            </span>
            @include(config('files.components') . '.angle_svg')
        </a>

        <!-- Dropdown Start -->
        <div x-show="dropdownOpen"
            class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark">
                @include(config('files.components') . '.profile_list', [
                    'prop' => [
                        'link' => '',
                        'svg' => config('files.svg') . 'profile',
                        'text' => __('messages.mprofile'),
                    ],
                ])
                @include(config('files.components') . '.profile_list', [
                    'prop' => [
                        'link' => 'messages.html',
                        'svg' => config('files.svg') . 'contact',
                        'text' => __('messages.mcontact'),
                    ],
                ])

                @include(config('files.components') . '.profile_list', [
                    'prop' => [
                        'link' => 'messages.html',
                        'svg' => config('files.svg') . 'setting',
                        'text' => __('messages.settings'),
                    ],
                ])
            </ul>
            <a href="{{ $logout_url }}"
                class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                @include(config('files.svg') . 'logout')
                {{__("messages.logout")}}
            </a>
        </div>
        <!-- Dropdown End -->
    </div>
    <!-- User Area -->
@endif
