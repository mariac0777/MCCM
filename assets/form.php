<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>
    <form action="form.php" method="POST">
    <?php
    $nombre = "";
    $password = "";
    $email = "";
    $pais = "";
        if (isset ($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $guardar = array();
            
            if ($nombre == "") {
                array_push($guardar,"El nombre no puede ir vacio");
            }
            
            if ($password == "" || strlen($password <7)) {
                array_push($guardar,"Contraseña vacia ó no tiene más de 7 caracteres");
            }
            
            if ($email == "" || strpos($email,"@")===false) {
                array_push($guardar,"Digite un correo valido");
            }

            if (count($guardar)>0) {
                for ($i=0; $i < count($guardar); $i++)  {
                    echo "<li>".$guardar[$i]. "</li>";
                }
            }else   {
                echo "Datos Correctos";
            }
        }
    ?>
        <p>Nombre:</br>
        <input type="text" name="nombre">
        </p>
        <br>
        <p>Contraseña:</br>
        <input type="password" name="password"></p><br>

        <p>Email:</br>
        <input type="text" name="email"></p><br>

        <p> País de Origen: </br>

    <select name="pais" id="">
        <option value="">Seleccione un País</option>
        <option value="mx">Mexico</option>
        <option value="vn">Venezuela</option>
        <option value="ch">Chile</option>
        <option value="ec">Ecuador</option>
        <option value="co">Colombia</option>
    </select>
    </p>
        <br>

        <input type="submit" action="indexlii.html" name="submit" value="enviar">
    </form>
</body>
</html>