<?php 

include 'conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nombre'], $_POST['email'], $_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "Datos recibidos: <br>";
        echo "Nombre: $nombre<br>";
        echo "Email: $email<br>";
        echo "Password: $password<br>";

        $query = "INSERT INTO usuario (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

        
        if ($conn->query($query) === TRUE) {
            echo "Registro exitoso.";
            header("Location: home.html");
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
} else {
    echo "Error: No se recibieron datos por POST.";
}

// Cerrar la conexión
$conn->close();
?>
