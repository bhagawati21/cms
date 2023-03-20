<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="assets/css/style.css" />
</head>
	<body>
		@include('partials.header')
		@include('partials.sidebar')
		@yield('body')
		@include('partials.footer')
	</body>
</html>
