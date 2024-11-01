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

$sql = "SELECT * FROM cart";
$result = $db->query($sql);

// if ($result && $result->num_rows > 0) {
//     echo "<table border='1'>
//             <tr>
//                 <th>Name</th>
//                 <th>Description</th>
//                 <th>Price</th>
//                 <th>Amount</th>
//             </tr>";

//     // Recorre los resultados y los muestra en una tabla HTML
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//                 <td>" . htmlspecialchars($row['name']) . "</td>
//                 <td>" . htmlspecialchars($row['description']) . "</td>
//                 <td>" . htmlspecialchars($row['price']) . "</td>
//                 <td>" . htmlspecialchars($row['amount']) . "</td>
//               </tr>";
//     }
    
//     echo "</table>";
// } else {
//     echo "No se encontraron resultados.";
// }

// Cerrar la conexión
$db->close();
?>
