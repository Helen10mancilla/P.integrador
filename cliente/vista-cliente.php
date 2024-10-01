<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Cliente - La Gran Cosecha</title>
    <link rel="stylesheet" href="styles-cliente.css"> <!-- Asegúrate de tener este archivo CSS para el estilo -->
</head>
<body>
    <header>
        <h1>Bienvenidos a La Gran Cosecha</h1>
        <nav>
            <ul>
                <li><a href="cliente-vista.php">Inicio</a></li>
                <li><a href="ver-carrito.php">Carrito</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="categorias">
            <h2>Categorías de Productos</h2>
            <div class="lista-categorias">
                <a href="categoria.php?nombre=verduras">Verduras</a>
                <a href="categoria.php?nombre=frutas">Frutas</a>
                <a href="categoria.php?nombre=hortalizas">Hortalizas</a>
                <a href="categoria.php?nombre=tuberculos">Tubérculos</a>
                <a href="categoria.php?nombre=vegetales">Vegetales</a>
            </div>
        </section>

        <section class="productos">
            <h2>Productos Disponibles</h2>
            <div class="lista-productos">
                <?php
                // Conexión a la base de datos
                include 'conexion.php'; // Asegúrate de tener tu archivo de conexión a la base de datos

                // Verificar si se ha seleccionado una categoría
                if (isset($_GET['nombre'])) {
                    $categoria = $_GET['nombre'];

                    // Obtener los productos de la categoría seleccionada
                    $query = "SELECT * FROM productos WHERE categoria = '$categoria'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($producto = mysqli_fetch_assoc($result)) {
                            echo "<div class='producto'>";
                            echo "<h3>" . $producto['nombre'] . "</h3>";
                            echo "<p>Precio: $" . $producto['precio'] . "</p>";
                            echo "<form action='agregar-carrito.php' method='POST'>";
                            echo "<input type='hidden' name='producto_id' value='" . $producto['id'] . "'>";
                            echo "<button type='submit'>Agregar al Carrito</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No hay productos disponibles en esta categoría.</p>";
                    }
                } else {
                    echo "<p>Selecciona una categoría para ver los productos.</p>";
                }

                // Cerrar conexión
                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 La Gran Cosecha</p>
    </footer>
</body>
</html>
