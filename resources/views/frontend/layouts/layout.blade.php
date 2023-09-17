<!DOCTYPE html>
<html lang="en">

<head>
    <title>Router OS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{asset('backend/assets/media/logos/favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @include('frontend.layouts.style')
    @stack('css')
    <style>
        :root {
        --primary-color: {{setting('site_color') ?? "#007fc4"}};
        }
    </style>

</head>

<body>
    @yield('content')
</body>

@include('frontend.layouts.script')

</html>
