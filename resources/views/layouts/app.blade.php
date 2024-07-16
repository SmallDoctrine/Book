<!doctype html>
<html lang="ru">
<head>
    <script src="https://cdn.tailwindcss.com"></script>

    </script>

    <title>@yield('title')| Криптовалюта</title>
</head>
<body>
@include( 'components.ForLayouts.Header')
@if (session('up'))
    <div class="alert alert-success">
        {{ session('up') }}
    </div>

@endif

<div class="container mx-auto">
    @yield('cont')

</div>
@include('components.ForLayouts.Footer')
</body>
</html>
