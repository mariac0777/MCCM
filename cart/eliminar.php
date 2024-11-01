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

// Comprueba si se ha enviado un nombre
if (isset($_GET['name'])) {
    $name = mysqli_real_escape_string($db, $_GET['name']); // Escapa el nombre para prevenir inyecciones SQL

    // Consulta la cantidad actual del producto
    $sql_check = "SELECT amount FROM cart WHERE name = '$name'";
    $result = mysqli_query($db, $sql_check);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_amount = $row['amount'];

        if ($current_amount > 1) {
            // Si la cantidad es mayor a 1, reduce en 1
            $new_amount = $current_amount - 1;
            $sql_update = "UPDATE cart SET amount = ? WHERE name = ?";
            $stmt_update = mysqli_prepare($db, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "is", $new_amount, $name);

            if (mysqli_stmt_execute($stmt_update)) {
                echo "Cantidad actualizada correctamente.";
            } else {
                echo "Error al actualizar la cantidad: " . mysqli_error($db);
            }

            mysqli_stmt_close($stmt_update);
        } else {
            // Si la cantidad es 1, elimina el producto completamente
            $sql_delete = "DELETE FROM cart WHERE name = ?";
            $stmt_delete = mysqli_prepare($db, $sql_delete);
            mysqli_stmt_bind_param($stmt_delete, "s", $name);

            if (mysqli_stmt_execute($stmt_delete)) {
                echo "Producto eliminado completamente.";
            } else {
                echo "Error al eliminar el producto: " . mysqli_error($db);
            }

            mysqli_stmt_close($stmt_delete);
        }
    } else {
        echo "Producto no encontrado.";
    }

    mysqli_free_result($result);
} else {
    echo "No se recibió un nombre.";
}

// Cierra la conexión
mysqli_close($db);

// Redirigir a la página principal o a la lista después de eliminar
header("Location: index.php"); // Cambia "index.php" por el nombre de tu página principal
exit();
?>
