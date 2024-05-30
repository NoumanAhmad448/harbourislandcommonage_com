<nav
    class="fixed top-0 w-full py-2 px-12 flex justify-between items-center z-30 sticky-header
     general-header sticky-header-active">
    <div class="min-w-max">
        {{-- <a href=""><img width="100" src="/img/house-logo.png" alt=""></a> --}}
    </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul
            class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse
                        md:flex-row md:mt-0 md:border-0">
            <li><a class="inline-block p-4 text-white {{ request('type') == '3' ? 'bg-gray-50' : '' }}"
                    href="">{{ __('Land') }}</a></li>
            <li><a class="inline-block p-4 text-white {{ request('type') == '2' ? 'bg-gray-50' : '' }}"
                    href="">{{ __('Villa') }}</a></li>
            <li><a class="inline-block p-4 text-white {{ request('type') == '1' ? 'bg-gray-50' : '' }}"
                    href="">{{ __('Apartment') }}</a></li>
            <li><a class="inline-block p-4 text-white {{ request()->is('*page/about-us*') ? 'bg-gray-50' : '' }}"
                    href="#footer">
                    {{ __('messages.contact') }}</a></li>
            <li><a class="inline-block p-4 text-white  {{ request()->is('page/contact-us') ? 'bg-gray-50' : '' }}"
                    href="#footer">
                    {{ __('messages.about_u') }}</a></li>
        </ul>
    </div>


    <div class="min-w-max text-3xl flex justify-end">
        <!------ Currency Change Button ------->
        {{-- <div class="mr-10 text-2xl currency">
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href=""
                title="Change Currency to Doller">$</a>
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href=""
                title="Change Currency to Lira">₺</a>
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href=""
                title="Change Currency to Taka">৳</a>
        </div> --}}
        {{-- </a> --}}
    </div>
    <button data-collapse-toggle="navbar-dropdown" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden
    hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700
     dark:focus:ring-gray-600"
        aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>
</nav>
