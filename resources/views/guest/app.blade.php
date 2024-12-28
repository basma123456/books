<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Website Example</title>
    @include('guest.layouts.header.links')



    @yield('styles')
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>



@include('guest.layouts.header.navbar')
@yield('content')

@include('guest.layouts.footer.footer')
@include('guest.layouts.footer.scripts')

</body>
</html>
