<?php
// Procesamiento de inicio de sesión básico, puedes agregar validación y consultas a base de datos aquí.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Aquí puedes añadir validación o manejo de datos, como consultar la base de datos
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Contraseña: " . htmlspecialchars($password);
}
?>
