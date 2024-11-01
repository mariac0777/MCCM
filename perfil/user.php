<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #f0f0f0;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .icons {
            font-size: 1.2rem;
        }
        main {
            flex-grow: 1;
            padding: 2rem;
        }
        .user-info {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .info-item {
            margin-bottom: 1rem;
        }
        .info-label {
            font-weight: bold;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .social-links {
            margin-top: 1rem;
        }
        .social-links a {
            color: white;
            text-decoration: none;
            margin: 0 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">MyWebsite</div>
        <div class="icons">
            <span>🛒</span>
            <span>👤</span>
        </div>
    </header>

    <main>
        <div class="user-info">
            <h1>User Profile</h1>
            <div class="info-item">
                <span class="info-label">Name:</span> John Doe
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span> john.doe@example.com
            </div>
            <div class="info-item">
                <span class="info-label">Location:</span> New York, USA
            </div>
            <div class="info-item">
                <span class="info-label">Bio:</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
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

<body>

<h1>Bienvenido, 
    <?php echo htmlspecialchars($usuario['nombre']); ?></h1>
<p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
<p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>