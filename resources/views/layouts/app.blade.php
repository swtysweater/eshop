<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @if(View::hasSection('styles'))
        @yield('styles')
        @else
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @endif
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</head>
<body>

    <div class="mt-4 container text-center">

        @include('inc.navbar')
        @auth
        <search img-path="{{asset('images/products/')}}" item-path="{{asset(route('item'))}}"></search>
        @endauth
        @yield('content')
    </div>
    
    <script src="https://kit.fontawesome.com/6f2667af00.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

