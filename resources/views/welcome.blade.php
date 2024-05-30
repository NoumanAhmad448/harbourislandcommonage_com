@extends(config('setting.body'))
@section('page-css')
@endsection
@section('content')
    @include('session_msg')
    @if(config("setting.en_wel"))
        <div class="relative z-10 pt-48 pb-52 bg-cover bg-center"
        style="background-image: url({{url(config('setting.im_wel'))}})">
            <div class="absolute h-full w-full bg-black opacity-70 top-0 left-0 z-10"></div>
            <div class="container relative z-20 text-white text-center text-2xl">
                <h2 class="font-bold text-5xl mb-8 langBN">
                    {{ __("messages.wel_title") }}
                </h2>
                <p class="text-2xl mt-8 langBN">
                    {{ __("messages.wel_desc") }}
                </p>
            </div>
        </div>
    @endif

    @if(config("setting.en_typewriter"))
        <div class="-mt-10">
            <div class="container">
                <div class="rounded-lg bg-white p-4 relative z-20 shadow-lg home-search" id="typewriter">
                    {{ __("messages.about_us") }}
                </div>
            </div>
        </div>
    @endif


    {{-- <div class="py-20 text-center">
        <div class="container">
            <h2 class="section-heading">Lorem ipsum dolor sit amet, consectetur<br /> adipisicing elit. A aut autem dolorum
                <span class="underline">quis vitae!</span></h2>
            <p class="text-gray-500 text-2xl font-bold mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Harum, voluptatem!</p>

            <a class="border-2 border-gray-700 rounded-2xl text-xl px-8 py-3 inline-block" href="">Start The
                Searching</a>

            <h2 class="section-heading pt-14">Lorem ipsum dolor sit amet adipisicing<br /> adipisicing elit. A aut lorum
            </h2>

            <div class="w-4/5 mx-auto">
                <div class="flex -mx-3 flex-wrap justify-between mt-10">
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Huge selection of real estate</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolore</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @if(config("setting.en_mo_info_con"))
        <div class="container text-center pt-14">
            <h2 class="section-heading">{{ __('messages.mo_info') }}</h2>
            @if(config("setting.en_im_glass"))
                <div class="relative mt-10 mb-14 bg-cover rounded-xl py-24 bg-center"
                    style="background-image: url({{url(config('setting.im_glass'))}}">
                    <div class="absolute w-full h-full rounded-xl opacity-50 bg-black left-0 top-0"></div>
                    <div class="relative z-20">
                        <h2 class="text-white mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl dark:text-white">
                            {{ __("messages.get_in") }}
                        </h2>
                        <p class="text-white text-xl flex flex-col justify-center items-center">
                            {{-- <span
                                class="border-2 border-white w-12 h-12 text-center pt-1 pl-1 leading-10 text-2xl hover:border-yellow-500 duration-200 rounded-full mb-2"><i
                                class="fa fa-play"></i>
                            </span> --}}
                            {{ __("messages.getting_invol") }}
                        </a>
                    </div>
                </div>
            @endif

            @if(config("setting.en_newsupdates"))
                <div class="text-xl">
                    <h2 class="flex flex-col justify-center items-center mb-4 text-4xl font-extrabold leading-none
                                tracking-tight md:text-5xl lg:text-6xl dark:text-white">
                        {{ __("messages.NewsUpdates") }}
                    </h2>
                    <p>
                        {{ __("messages.News & Updates") }}
                    </p>
                </div>
            @endif
        </div>
    @endif

    @if(config("setting.en_im_event"))
    <div class="container pt-14 sm:mt-10">
        <div class="md:flex md:justify-between md:items-center">
            <div class="flex-1 mr-10 text-lg leading-normal">
                <h2 class="flex flex-col justify-center items-center mb-4 text-4xl font-extrabold leading-none
                         tracking-tight md:text-5xl lg:text-6xl dark:text-white">
                        {{ __("messages.event") }}
                </h2>
                <p>{{ __("messages.event_desc") }}</p>
            </div>
            <div class="flex md:ml-10 mt-5 mt-md-0 lg:justify-between lg:items-center md:flex-1">
                <img class="rounded w-full" src="{{url(config('setting.im_event'))}}" alt="{{ __("messages.event") }}">
            </div>
        </div>
    </div>
    @endif
    @if(config("setting.en_im_sponsorship"))
        <div class="container pt-14 sm:mt-10">
            <div class="md:flex md:justify-between md:items-center">
                <div class="flex-1">
                    <img class="rounded" src="{{url(config('setting.im_sponsorship'))}}" alt="{{ __("messages.Sponsorship") }}">
                </div>
                <div class="flex-1 ml-10 text-lg leading-normal justify-center items-center">
                    <h2 class="flex flex-col justify-center items-center mb-4 text-4xl font-extrabold leading-none
                            tracking-tight md:text-5xl lg:text-6xl dark:text-white">
                            {{ __("messages.Sponsorship") }}
                    </h2>
                    <p>{{ __("messages.Sponsorship_desc") }}</p>
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="container pt-14">
        <div class="flex justify-center items-center">
            <a href="" class="btn">Start searching with filters</a>
            <p class="mx-10">or</p>
            <a href="" class="btn-outline">Start searching on the map</a>
        </div>
    </div> --}}
@endsection
@section('script')
@endsection
