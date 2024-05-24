@extends(config('setting.body'))
@section('page-css')
@endsection
@section('content')
@include('session_msg')
    <div class="text-center">{{ __('messages.welcome') }}</div>
@endsection
@section('script')
@endsection
