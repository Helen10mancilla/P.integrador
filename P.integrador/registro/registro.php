<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña
    $role = 'cliente'; // Por defecto, asigna el rol de cliente

    // Insertar en la base de datos
    $query = "INSERT INTO usuarios (nombre_usuario, correo, contraseña, rol) VALUES ('$username', '$email', '$password', '$role')";
    
    if (mysqli_query($conn, $query)) {
        echo "Registro exitoso";
        header("Location: login.php"); // Redirige al login
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

