<?php

use App\Models\UserAnnModel;
use App\Models\Categories;
use Illuminate\Support\Facades\Cache;


?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title id="seo_title">  {{ config('app.name') }}  </title>
        <meta id="seo_desc" name="description" content="{{config('setting.default_desc')}}">
        <meta property="og:title" content="{{ config('app.name') }}">
        <meta id="seo_fb" property="og:description" content="{{config('setting.default_desc')}}">
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset(config('setting.app_css')) }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
             crossorigin="anonymous"
             >
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        @yield('page-css')
        <script src="{{config('setting.common_functions')}}"></script>
    </head>
    <body style="min-height: 100vh !important" class="d-flex flex-column">

     @if(!(Cache::store('file')->get('isLoaderLoaded')))
     {!!
       '<section class="d-flex justify-content-center align-items-center loading-section">
            <div id="loading" class="spinner-border text-info text-center" style="width: 90px; height: 90px"
                 role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </section>' !!}
        @php Cache::store('file')->put('isLoaderLoaded', true, 3600); @endphp
    @endif
    @if(isset($ann) && $ann->count())
        <div class="container-fluid font-bold text-center" >
            <div class="row">
                <div class="col-12">

                    <div  class="alert alert-info mb-1 font-bold alert-dismissible fade show"
                    role="alert"  style="font-weight: bold"> {{ $ann -> message ?? ''}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <!-- main Content -->
        <main>
            @yield('content')
        </main>


        @yield('script')
    </body>
</html>
