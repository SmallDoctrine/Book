<!doctype html>
<html lang="ru">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')| Криптовалюта</title>
</head>
<body>
@include( 'components.ForLayouts.Header')

<div class="container mx-auto">
    @yield('cont')
</div>
@include('components.ForLayouts.Footer')
</body>
</html>
