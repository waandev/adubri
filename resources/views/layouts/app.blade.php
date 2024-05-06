<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    @include('includes.backsite.meta')

    <title>@yield('title') | Aduan BRI Backsite</title>

    <link rel="apple-touch-icon" href="{{ asset('/assets/frontsite/img/logo-minasa.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/frontsite/img/logo-minasa.png') }}">
    <link
        href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700') }}"
        rel="stylesheet">

    @stack('before-style')
    @include('includes.backsite.style')
    @stack('after-style')

</head>

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu"
    data-col="2-columns">

    @include('components.backsite.header')
    @include('components.backsite.menu')
    @yield('content')
    @include('components.backsite.footer')

    @stack('before-script')
    @include('includes.backsite.script')
    @stack('after-script')

</body>

</html>
