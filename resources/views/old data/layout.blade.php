<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>@yield('title')</title>
    
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- tailwind play cdn -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>
    
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>