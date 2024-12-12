<?php

include "../conexion.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $nombre = mysqli_real_escape_string($conn, $_POST['txtName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['pass2']);
    
    // Verificar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit;
    }
    
    // Cifrar la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el usuario en la base de datos
    $query = "INSERT INTO usuarios (nombre, email, contrasena, estatus) 
              VALUES ('$nombre', '$email', '$password_hashed', 'Activo')";
    
    if (mysqli_query($conn, $query)) {
        // Redirigir al usuario a una página de éxito o login
        header("Location: login.php");
        exit;
    } else {
        // Si ocurre un error
        echo "Error: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);


?>