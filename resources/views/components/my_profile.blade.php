@if (config('setting.en_prfle_form'))
    <div class="px-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <section class="mt-20">
                <h1 class="pb-5 font-semibold text-xl text-gray-600">{{ __('messages.mprofile') }}</h1>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    @include(config('files.forms') . 'my_profile')
                    @if (is_auth_user())
                        @include(config('files.forms') . 'col', [
                            config("vars.input") => config('files.forms') . 'submit',
                            config("vars.move_btn_right") => true,
                            config('vars.id') => config("table.SubmitButton"),
                            config('vars.text') => __("label.SubmitButton"),
                        ])
                    @else
                        <div class="md:col-span-2">
                            <div class="text-white bg-red-500"> {{ __('messages.prob_action') }} </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endif
