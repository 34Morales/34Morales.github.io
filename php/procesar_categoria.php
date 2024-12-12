<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pagina1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar las acciones
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        // Agregar nueva categoría
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $conn->real_escape_string($_POST['nombre']);
            $descripcion = $conn->real_escape_string($_POST['descripcion']);

            $sql = "INSERT INTO categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
            if ($conn->query($sql) === TRUE) {
                echo "Categoría añadida con éxito.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        break;

    case 'edit':
        // Editar una categoría existente
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $nombre = $conn->real_escape_string($_POST['nombre']);
            $descripcion = $conn->real_escape_string($_POST['descripcion']);

            $sql = "UPDATE categorias SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Categoría actualizada con éxito.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        break;

    case 'delete':
        // Eliminar una categoría
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "DELETE FROM categorias WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Categoría eliminada con éxito.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        break;

    case 'get':
        // Obtener todas las categorías para cargar en la tabla
        $sql = "SELECT * FROM categorias";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $categorias = [];
            while ($row = $result->fetch_assoc()) {
                $categorias[] = $row;
            }
            echo json_encode($categorias);
        } else {
            echo json_encode([]);
        }
        break;

    case 'getById':
        // Obtener una categoría específica para edición
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM categorias WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(['error' => 'Categoría no encontrada.']);
            }
        }
        break;

    default:
        echo "Acción no válida.";
        break;
}

// Cerrar conexión
$conn->close();
?>
