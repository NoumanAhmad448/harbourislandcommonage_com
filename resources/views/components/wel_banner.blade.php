@if (config('setting.en_wel'))
    <div class="relative z-10 pt-48 pb-52 bg-cover bg-center"
        style="background-image: url({{ url(config('setting.im_wel')) }})">
        <div class="absolute h-full w-full bg-black opacity-70 top-0 left-0 z-10"></div>
        <div class="container relative z-20 text-white text-center text-2xl">
            <h2 class="font-bold text-5xl mb-8 langBN">
                {{ __('messages.wel_title') }}
            </h2>
            <p class="text-2xl mt-8 langBN">
                {{ __('messages.wel_desc') }}
            </p>
        </div>
    </div>
@endif
