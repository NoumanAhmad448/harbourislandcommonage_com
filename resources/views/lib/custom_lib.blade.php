<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> --}}

    <link rel="shortcut icon" href="{{ asset(config('setting.favicon')) }}">
    <title id="seo_title"> {{ config('app.name') }} </title>
    <meta id="seo_desc" name="description" content="{{ config('setting.default_desc') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta id="seo_fb" property="og:description" content="{{ config('setting.default_desc') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" --}}
        {{-- integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url(config('setting.app_css')) }}">

    {{-- should alway be in the end --}}
    <script>
        debug = '{{ config('app.debug') ? 1 : 0 }}';
        debug = debug == "1" ? true : false;
        let err_msg = '{{ __('messages.err_msg') }}';
    </script>

    {{-- add global js file here --}}
    <script src="{{ url(config('setting.app_js')) }}"></script>
    <script src="{{ url(config('setting.common_functions')) }}"></script>
    {{-- should not include after this line --}}
