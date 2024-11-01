<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mccm";
$db = mysqli_connect($servidor, $usuario, $clave, $basededatos);

// Verifica si la conexión fue exitosa
if (!$db) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibe los datos enviados desde el cliente
$imagen = isset($_POST['imagen']) ? str_replace(' ', '_', $_POST['imagen']) : ''; // Reemplaza espacios con guiones bajos
$nombre = isset($_POST['nombre']) ? str_replace(' ', '_', $_POST['nombre']) : ''; // Reemplaza espacios con guiones bajos
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : '';
$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 1; // Convierte a número entero, cantidad por defecto 1

// Primero, verifica si el producto ya existe en la base de datos
$sql_check = "SELECT amount FROM cart WHERE name = ?";
$stmt_check = mysqli_prepare($db, $sql_check);
mysqli_stmt_bind_param($stmt_check, "s", $nombre);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if (mysqli_stmt_num_rows($stmt_check) > 0) {
    // El producto ya existe, incrementa la cantidad
    mysqli_stmt_bind_result($stmt_check, $existing_amount);
    mysqli_stmt_fetch($stmt_check);
    $new_amount = $existing_amount + $cantidad;

    // Actualiza la cantidad en la base de datos
    $sql_update = "UPDATE cart SET amount = ? WHERE name = ?";
    $stmt_update = mysqli_prepare($db, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "is", $new_amount, $nombre);

    if (mysqli_stmt_execute($stmt_update)) {
        echo "Cantidad actualizada correctamente.";
    } else {
        echo "Error al actualizar la cantidad: " . mysqli_error($db);
    }

    mysqli_stmt_close($stmt_update);
} else {
    // El producto no existe, inserta un nuevo registro
    $sql_insert = "INSERT INTO cart (name, description, price, amount) VALUES (?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($db, $sql_insert);

    if ($stmt_insert) {
        mysqli_stmt_bind_param($stmt_insert, "sssi", $nombre, $descripcion, $precio, $cantidad);
        
        if (mysqli_stmt_execute($stmt_insert)) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($db);
        }

        mysqli_stmt_close($stmt_insert);
    } else {
        echo "Error en la preparación de la consulta de inserción: " . mysqli_error($db);
    }
}

mysqli_stmt_close($stmt_check);
mysqli_close($db);
?>
