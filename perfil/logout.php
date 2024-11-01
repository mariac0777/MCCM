<?php
    session_destroy(); // Cerrar sesión
    header("Location: /mccm/login/index.php"); // Redirigir al login
    exit; 
?>
