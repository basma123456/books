<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Website Example</title>
    @include('guest.layouts.header.links')



    @yield('styles')
    <style>
        :root{
            --main_color: black;
        }

        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        body {
            background-image: url("{{asset('assets/client/images/backgrounds/room.png')}}");
            box-shadow: 100vh 135vh rgba(0,0,0,0.4) inset;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

        }

        .whole_page{
            height: 100vh;
        }

        footer{
            bottom: 0;
        }

        .main_image{
            width: 100%;
            height: 100%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9), 0 6px 20px 0 rgba(0, 0, 0, 0.8);

        }

        .main_container{
            /*background-color: rgba(241, 255, 244, 0.5);*/
            padding: 50px;
            border-radius: 15px;
        }

        .main_h{
           color: white;
            margin-top: 130px;
            font-size: 50px;
            margin-bottom: 20px;
            text-shadow: 4px 4px 8px #000000;

        }
        .main_p{
            color: white;
            margin-bottom: 0;
            margin-top: 10px;
            text-shadow: 4px 4px 8px #000000;

        }

        .navbar{
background-color: var(--main_color) !important;
        }
        .main_image{
            border-radius: 372px;
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
