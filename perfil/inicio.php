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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Verifica si el email ya está registrado
    $check_query = "SELECT * FROM user WHERE email = ?";
    $stmt_check = mysqli_prepare($db, $check_query);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        echo "El correo ya está registrado. Intenta con otro.";
    } else {
        // Hash de la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Inserta el nuevo usuario
        $insert_query = "INSERT INTO user (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($db, $insert_query);
        mysqli_stmt_bind_param($stmt_insert, "ssss", $name, $email, $phone, $password_hash);

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="icon"> <img src="../assets/mccmicon.jpeg" width="90"></div>
            <nav class="nav">
                <a href="../cart/index.php" style="color: white; text-decoration: none;">🛒Cart</a>
                <a href="../perfil/inicio.php" style="color: white; text-decoration: none;">👤 Usuario</a>
                <a href="../login/index.php" style="color: white; text-decoration: none;">👤 Login</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="form-section">
            <h2>Registro de Usuario</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Registrarse</button>
            </form>
        </div>
    </main>

    <footer>
        <div>© 2023 MyWebsite. All rights reserved.</div>
        <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>
</body>
</html>
