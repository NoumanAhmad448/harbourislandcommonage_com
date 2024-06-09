@php

    $title = $title ?? __('messages.PersonalDetails');
    $desc = $desc ?? __('messages.PersonalDetails_desc');
@endphp
<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3 my-4">
    <div class="text-gray-600">
        <p class="font-medium text-lg">{{ $title }}</p>
        <p>{{ $desc }}</p>
    </div>

    <div class="lg:col-span-2">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
            @include('components.forms.three_col', ['input' => 'components.forms.firstname'])
            @include('components.forms.two_col', ['input' => 'components.forms.lastname'])
            @include('components.forms.five_col', ['input' => 'components.forms.email'])

            @include('components.forms.three_col', ['input' => 'components.forms.password'])
            @include('components.forms.two_col', ['input' => 'components.forms.repeat_password'])
        </div>
    </div>
</div>
