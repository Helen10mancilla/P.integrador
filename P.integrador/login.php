<?php
session_start();
include('db.php'); // Archivo que contiene la conexión a la base de datos.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta en la base de datos para verificar el usuario
    $query = "SELECT * FROM usuarios WHERE correo = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verificar la contraseña
        if (password_verify($password, $user['contraseña'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['rol'] = $user['rol'];

            // Redirigir dependiendo del rol
            if ($user['rol'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: productos.php");
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
