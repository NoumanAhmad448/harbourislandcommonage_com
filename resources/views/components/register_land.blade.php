@if (config('setting.en_reg_form'))
    <div class="bg-gray-100 flex items-center justify-center">
        <div>
            <section class="mt-10">
                <h1 class="pb-5 font-semibold text-xl text-gray-600">{{ __('messages.reg_form_title') }}</h1>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    @if(!auth()->user())
                        @include(config("files.components").".register_user")
                        <hr/>
                    @endif
                    @include(config("files.components").".land_registeration")

                    @if(is_normal_user())
                        @include(config("files.forms")."col", ["input" => config("files.forms")."submit",
                        "move_btn_right" => true, "id" => "submit"])
                    @else
                        <div class="md:col-span-2">
                            <div class="text-white bg-red-500"> {{ __("messages.prob_action")}} </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endif
