
<div class="fixed top-0 w-full py-2 px-12 flex justify-between items-center z-30 sticky-header {{request()->routeIs('home') ? '' : 'general-header'}}">
    <div class="min-w-max">
        <a href=""><img width="100" src="/img/house-logo.png" alt=""></a>
    </div>

    <div class="w-full">
        <ul class="flex justify-center">
            <li><a class="inline-block p-4 text-white {{request('type') == '3' ? 'bg-gray-50' : ''}}" href="">{{ __('Land') }}</a></li>
            <li><a class="inline-block p-4 text-white {{request('type') == '2' ? 'bg-gray-50' : ''}}" href="">{{ __('Villa') }}</a></li>
            <li><a class="inline-block p-4 text-white {{request('type') == '1' ? 'bg-gray-50' : ''}}" href="">{{ __('Apartment') }}</a></li>
            <li><a class="inline-block p-4 text-white {{ request()->is('*page/about-us*') ? 'bg-gray-50' : '' }}" href="#footer">
                {{ __('messages.contact') }}</a></li>
            <li><a class="inline-block p-4 text-white  {{ request()->is('page/contact-us') ? 'bg-gray-50' : '' }}" href="#footer">
                {{ __('messages.about_u') }}</a></li>
        </ul>
    </div>


    <div class="min-w-max text-3xl flex justify-end">
        <!------ Currency Change Button ------->
        {{-- <div class="mr-10 text-2xl currency">
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href="" title="Change Currency to Doller">$</a>
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href="" title="Change Currency to Lira">₺</a>
            <a class="inline-block text-xl rounded-full px-3 py-1 text-white" href="" title="Change Currency to Taka">৳</a>
        </div> --}}
        </a>
    </div>

</div>
