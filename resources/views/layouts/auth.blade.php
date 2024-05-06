<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.auth.meta')

    <title>@yield('title') | Adu BRI</title>

    @stack('before-style')
    @include('includes.auth.style')
    @stack('after-style')

</head>

<body>
    {{-- @include('sweetalert::alert') --}}

    @yield('content')

    @stack('before-script')
    @include('includes.auth.script')
    @stack('after-script')
</body>
