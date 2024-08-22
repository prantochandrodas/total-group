<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel Project</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- navbar css  --}}
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    {{-- banner css  --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    {{-- product css  --}}
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    {{-- footer css  --}}
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    {{-- about page css --}}
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
    {{-- news page css  --}}
    <link rel="stylesheet" href="{{asset('css/news.css')}}">
</head>

<body>

    @include('frontend.partials._header')

    @yield('frontend-content')

    @include('frontend.partials._footer')

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
