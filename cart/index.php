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
$total = 0; // Inicializa el total antes del bucle
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart shop</title>
    <link rel="stylesheet" href="./index.css">
    <script>
        function eliminarElemento(name) {
            if (confirm("¿Estás seguro de que quieres eliminar este elemento?")) {
                window.location.href = 'eliminar.php?name=' + encodeURIComponent(name);
            }
        }
    </script>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <div class="icon">
                <a href="../home/index.php">
                    <img src="../assets/mccmicon.jpeg" width="90" />
                </a>
            </div>
            <nav class="nav">
                <a href="../home/index.php" style="color: white; text-decoration: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                    Home
                </a>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <div>
                <h1>Your Bag</h1>
                <?php
                if ($result && $result->num_rows > 0) {
                    echo "<table border='1'>
                        <tr>
                            <th>Imagen</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Eliminar</th>
                        </tr>";

                    while ($row = $result->fetch_assoc()) {
                        // Precio original con formato "COP 80.000"
                        $price_formatted = $row['price'];
                        $amount = (int) $row['amount'];

                        // Remueve "COP" y espacios, luego convierte a número
                        $price_numeric = floatval(str_replace(['COP', ' ', '.'], '', $price_formatted));

                        // Calcula el subtotal de cada elemento
                        $subtotal = $price_numeric * $amount;
                        $total += $subtotal;

                        echo "<tr>
                            <td>
                                <img src='../assets/" . htmlspecialchars($row['name']) . ".jpeg' 
                                     alt='" . htmlspecialchars($row['name']) . "' 
                                     width='50' height='50'>
                            </td>
                            <td>" . htmlspecialchars(str_replace('_', ' ', $row['name'])) . "</td>
                            <td>" . htmlspecialchars($row['description']) . "</td>
                            <td>" . htmlspecialchars($price_formatted) . "</td> <!-- Precio con formato original -->
                            <td>" . $amount . "</td>
                            <td>
                                <button onclick='eliminarElemento(\"" . htmlspecialchars($row['name']) . "\")'>
                                    Eliminar
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-trash-2'>
                                        <path d='M3 6h18'/>
                                        <path d='M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6'/>
                                        <path d='M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2'/>
                                        <line x1='10' x2='10' y1='11' y2='17'/>
                                        <line x1='14' x2='14' y1='11' y2='17'/>
                                    </svg>
                                </button>
                            </td>
                        </tr>";
                    }

                    // Mostrar el total a pagar
                    echo "<tr>
                            <td colspan='4'><strong>Total a pagar:</strong></td>
                            <td colspan='2'><strong>COP " . number_format($total, 0, ',', '.') . "</strong></td>
                          </tr>";
                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }

                // Cerrar la conexión
                $db->close();
                ?>
            </div>
        </section>
    </main>
</body>

</html>
