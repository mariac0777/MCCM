<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mccm";
$db = mysqli_connect($servidor, $usuario, $clave, $basededatos);

// Verifica si la conexión fue exitosa
if (!$db) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verifica si se enviaron los datos del formulario
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL preparada para verificar si el usuario existe
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verifica si el usuario existe y la contraseña es correcta
    if ($usuario = mysqli_fetch_assoc($resultado)) {
        if (password_verify($password, $usuario['password'])) {
            // Credenciales válidas: iniciamos sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['name'];
            $_SESSION['user_email'] = $usuario['email'];
            $_SESSION['user_phone'] = $usuario['phone'];

            // Redireccionamos a la página de perfil o bienvenida
            header("Location: ../home/index.php");
            exit;
        } else {
            echo "<script>alert('Contraseña incorrecta.')</script>";
        }
    } else {
        echo "<script>alert('Correo no registrado.')</script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<style>
    * {
        font-family: "Nunito", serif;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - MCCM</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="form-section">
            <h2>Iniciar sesión</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <button type="submit" class="btn"> Entra Aquí</button>
                </div>
            </form>

            <div style="display: column; align-items: center; justify-content: center;">
                <p class="login-text">¿No tienes una cuenta? <a href="../register/index.php">Regístrate</a></p>
            </div>
        </div>
        <div class="image-section"></div>
    </div>
</body>
</html>
