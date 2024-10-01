<?php
// Conexión a la base de datos
include 'conexion.php'; // Aquí debes incluir tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario existe en la base de datos
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Verificar el rol del usuario
            if ($user['role'] == 'administrador') {
                header("Location: admin-dashboard.php"); // Redirige al panel de administrador
            } else if ($user['role'] == 'cliente') {
                header("Location: cliente-dashboard.php"); // Redirige al panel de cliente
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró un usuario con ese correo.";
    }

    // Cerrar conexión
    mysqli_close($conn);
}

