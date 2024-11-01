<?php

include_once '../db/db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirige al usuario al login si no hay sesión activa
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Consulta para obtener la información del usuario
$query = "SELECT nombre, correo, telefono FROM `index` WHERE id = '$user_id'";
$resultado = mysqli_query($db, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
} else {
    echo "No se encontraron datos para este usuario.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
</head>
<body>

<h1>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?></h1>
<p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
<p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
