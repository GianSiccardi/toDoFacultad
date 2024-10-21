<?php
include 'conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];


if (empty($email) || empty($password)) {
    echo '
    <script>
        alert("Por favor, complete todos los campos.");
        window.location="index.php"; // Redirigir de nuevo al formulario
    </script>';
    exit;
}

$validar_login = mysqli_query($conn, "SELECT * FROM usuario WHERE email='$email' AND password='$password'");

if (mysqli_num_rows($validar_login) > 0) {

    header("Location: home.php");
    exit;
} else {
  
    echo '
    <script>
        alert("Email o contraseña incorrectos.");
        window.location="index.php"; // Redirigir de nuevo al formulario
    </script>';
    exit;
}
?>
