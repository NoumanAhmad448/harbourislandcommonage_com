@if (config('setting.en_reg_form'))
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <section class="mt-20">
                <h1 class="pb-5 font-semibold text-xl text-gray-600">{{ __('messages.reg_form_title') }}</h1>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">{{ __("messages.PersonalDetails")}}</p>
                            <p>{{ __("messages.PersonalDetails_desc")}}</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                @include("components.forms.three_col", ["input" => "components.forms.firstname"])
                                @include("components.forms.two_col", ["input" => "components.forms.lastname"])
                                @include("components.forms.five_col", ["input" => "components.forms.email"])
                                @include("components.forms.col", ["input" => "components.forms.submit"])
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endif
