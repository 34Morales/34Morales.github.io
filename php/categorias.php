<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pagina1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Acción de agregar categoría
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    $sql = "INSERT INTO categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nueva categoría agregada con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Acción de obtener datos de la categoría para editarla
if (isset($_GET['action']) && $_GET['action'] == 'get' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorias WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $categoria = $result->fetch_assoc();
        echo json_encode($categoria);
    } else {
        echo json_encode(['error' => 'Categoría no encontrada']);
    }
}

// Acción de editar categoría
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $id = $_POST['id'];
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    
    $sql = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Categoría actualizada con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Acción de eliminar categoría
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM categorias WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Categoría eliminada con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
