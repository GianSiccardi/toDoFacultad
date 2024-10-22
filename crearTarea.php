<?php 
session_start();
include 'conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = $_POST['titulo'];

        if (isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id'])) {
            $usuarioId = $_SESSION['usuario_id'];
        } else {
            echo "Error: No se ha encontrado el ID de usuario. Asegúrate de que el usuario esté autenticado.";
            exit;
        }

 
        echo "Datos recibidos: <br>";
        echo "Título: $titulo<br>";
        echo "Usuario ID: $usuarioId<br>";

       
        $query = "INSERT INTO tareas (titulo, usuario_id, completado) VALUES ('$titulo', '$usuarioId', 0)";

        if ($conn->query($query) === TRUE) {
            echo "Tarea creada exitosamente.";
            header("Location: home.php");
            exit;
        } else {
            echo "Error al crear la tarea: " . $conn->error;
        }
    } else {
        echo "Error: El campo título es obligatorio.";
    }
} else {
    echo "Error: No se recibieron datos por POST.";
}

$conn->close();
?>
