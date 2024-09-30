<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <header>
        <!-- Aquí puede ir el menú de navegación -->
        @include('partials.nav')
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Pie de página -->
        @include('partials.footer')
    </footer>

    <script src="{{ asset('js/Script.js') }}"></script>
</body>
</html>
