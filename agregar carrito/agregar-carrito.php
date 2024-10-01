<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];

    // Verificar si el carrito ya existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar el producto al carrito
    if (!in_array($producto_id, $_SESSION['carrito'])) {
        $_SESSION['carrito'][] = $producto_id;
    }

    // Redirigir a la vista de productos
    header('Location: cliente-vista.php');
}

session_start();

// Conexión a la base de datos
include 'conexion.php';

echo "<h1>Tu Carrito</h1>";

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $ids = implode(',', $_SESSION['carrito']);
    
    // Obtener los productos del carrito
    $query = "SELECT * FROM productos WHERE id IN ($ids)";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($producto = mysqli_fetch_assoc($result)) {
            echo "<p>" . $producto['nombre'] . " - $" . $producto['precio'] . "</p>";
        }
    }
} else {
    echo "<p>Tu carrito está vacío.</p>";
}

// Cerrar conexión
mysqli_close($conn);
?>

