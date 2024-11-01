<!DOCTYPE html>
<html lang="en">
  <style>
    body {
      background-image: url(fondo-login.jpg);
    }
  </style>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel=" stylesheet" href="./login.css" />
    <!-- <script src="data:image/jpeg;base64,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"></script> -->
    <title>Log in</title>
  </head>

  <?php
    $nombre = "";
    $password = "";
    $email = "";
    $pais = "";
        if (isset ($_POST ['nombre'])) {
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

  <body>
    <form method="POST" action="form.php">
    <div class="login">
        <div class="contenido">
          <h2>NETFLIX</h2>
        <h2>¡Bienvenido!</h2>
        <h3>A nuestra página</h3>
        <p>Disfruta de nuestra gran variedad de películas y series</p>
      </div>
      <div class="home">
        <div class="account">
          <h2>Crea tu cuenta</h2>
        </div>
        <div class="input">
          <input type="text" name="nombre" class="input-mail" autocomplete="off" required />
          <input type="password" name="pass" class="input-mail" autocomplete="off" required/>
        </div>
      </form>
        <div class="log">
          <a href="index.html">Entra aquí </a>
        </div>
      </div>
    </div>
  </body>
</html>
