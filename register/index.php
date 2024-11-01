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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $clave = $_POST['clave'];

    // Verifica si el email ya está registrado
    $check_query = "SELECT * FROM user WHERE email = ?";
    $stmt_check = mysqli_prepare($db, $check_query);
    mysqli_stmt_bind_param($stmt_check, "s", $correo);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        echo "El correo ya está registrado. Intenta con otro.";
    } else {
        // Hash de la contraseña
        $clave_hash = password_hash($clave, PASSWORD_DEFAULT);

        // Inserta el nuevo usuario
        $insert_query = "INSERT INTO user (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($db, $insert_query);
        mysqli_stmt_bind_param($stmt_insert, "ssss", $nombre, $correo, $telefono, $clave_hash);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: ../login/index.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($db);
        }

        mysqli_stmt_close($stmt_insert);
    }

    mysqli_stmt_close($stmt_check);
}

// Cierra la conexión
mysqli_close($db);
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
    <link rel="stylesheet" href="register.css">
    <title>Log In - MCCM</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Register</h2>
            <form action="" method="POST">
                <div class="bloque">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Email</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                </div>
                <div class="bloque">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="password" id="clave" name="clave" required>
                    </div>
                </div>
                <button type="submit" class="btn">Registrarse</button>
            </form>
            <p class="login-text">¿Ya eres miembro? <a href="../login/index.php">Login</a></p>
        </div>
        <div class="image-section"></div>
    </div>
</body>
</html>