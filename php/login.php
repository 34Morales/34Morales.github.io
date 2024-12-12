<?php 
session_start(); // Mantenemos solo esta llamada al inicio

include "../conexion.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = mysqli_real_escape_string($conn, $_POST['txtEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);

    // Consulta para obtener el usuario por el correo
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Si se encuentra el usuario, verificar la contraseña
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['contrasena'])) {
            // Si la contraseña es correcta, iniciar sesión
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['usuario_email'] = $user['email'];
            $_SESSION['usuario_estatus'] = $user['estatus'];

            // Redirigir al usuario a la página de inicio o al perfil
            header("Location: ../index.php"); // Cambia esto a la página que desees
            exit;
        } else {
            // Contraseña incorrecta
            header("Location: ../login.php?error=1");
            exit;
        }
    } else {
        // Usuario no encontrado
        header("Location: ../login.php?error=2");
        exit;
    }
}


// Si la contraseña es correcta, iniciar sesión
$_SESSION['userdata'] = [
    'id' => $user['id'],
    'nombre' => $user['nombre'],
    'email' => $user['email'],
    'estatus' => $user['estatus']
];

// Redirigir al usuario a la página de inicio o al perfil
header("Location: ../index.php");
exit;
?>
