<?php
// Simple handler for form submission, typically you would validate input and check against a database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Aquí puedes añadir validación o manejo de datos, como consultar la base de datos

    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Password: " . htmlspecialchars($password);
}
?>
