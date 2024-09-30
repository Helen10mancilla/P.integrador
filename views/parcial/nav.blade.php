<!-- resources/views/partials/nav.blade.php -->
<nav>
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('productos.index') }}">Productos</a></li>
        <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
        <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
    </ul>
</nav>
