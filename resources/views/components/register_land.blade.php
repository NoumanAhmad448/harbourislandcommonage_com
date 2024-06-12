@if (config('setting.en_reg_form'))
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <section class="mt-20">
                <h1 class="pb-5 font-semibold text-xl text-gray-600">{{ __('messages.reg_form_title') }}</h1>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    @if(!auth()->user())
                        @include(config("files.components").".register_user")
                        <hr/>
                    @endif
                    @include(config("files.components").".land_registeration")

                    @include(config("files.components").".forms.col", ["input" => config("files.components").".forms.submit",
                    "move_btn_right" => true, "id" => "submit"])
                </div>
            </section>
        </div>
    </div>
@endif
