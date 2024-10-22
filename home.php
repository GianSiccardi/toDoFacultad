
<?php
session_start();
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); 
    exit();
}

$usuarioId = $_SESSION['usuario_id'];

$sql = "SELECT * FROM tareas WHERE usuario_id = '$usuarioId'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>To Do List</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div class="container">
    <form action="logout.php" method="POST" class="log_out">
                <button type="submit">Cerrar sesión</button>
            </form>
        <div class="todo-app">
            <h2>To do List <img src=""></h2>

           

            <form class="row" action="crearTarea.php" method="POST">
                <input type="text" id="input-box" name="titulo" placeholder="Agrega tarea" required>
                <button type="submit">Agregar</button>
            </form>

            <ul id="list-container">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li onclick='toggleTask(this)'>" . htmlspecialchars($row["titulo"]) . "</li>";                    
                    }
                } else {
                    echo "<li>No hay tareas.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <script>
        // Función para alternar el estado de la tarea
        function toggleTask(task) {
            task.classList.toggle('checked');
        }
    </script>
</body>

</html>