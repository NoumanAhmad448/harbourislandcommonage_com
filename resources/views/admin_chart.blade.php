@extends(config('setting.admin_body'))
@section('page-css')
@endsection
@section('content')
    <!-- ===== Main Content Start ===== -->
    @if ($data['title'])
        <h1> {{ $data['title'] }} </h1>
    @endif

    <div class="grid grid-cols-4 sm:grid-cols-5 mt-10">
        @if ($data['users'])
        <section>
            <section class="ml-4">
                @include(config("files.svg").'.profile')
            </section>
            <div class="mt-3"> Users {{ $data['users'] }} </div>
        </section>
        @endif
        @if ($data['lands'])
        <section>
            <section class="ml-4">
                @include(config("files.svg").'.dashboard')
            </section>
            <div class="mt-3"> Lands {{ $data['lands'] }} </div>
        </section>
        @endif
    </div>
    <!-- ===== Main Content End ===== -->
@endsection
@section('script')
@endsection
