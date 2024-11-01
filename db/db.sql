-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS mccm;
USE mccm;

-- Crear la tabla 'cart'
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    amount INT NOT NULL
);

-- Crear la tabla 'user'
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15),
    password VARCHAR(255) NOT NULL
);

-- Tabla para las categorías
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

-- Tabla para las pinturas
CREATE TABLE paintings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    information VARCHAR(50),
    details VARCHAR(50),
    img VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

--- Llenar base de datos

-- Usar la base de datos mccm
USE mccm;

-- Insertar las categorías
INSERT INTO categories (name) VALUES
("Nudez/ Romance/ Sensualidad"),
("Realismo/ Abstracto/ Existencial"),
("Paisajes/ Impresionismo"),
("Animales/ Modernismo"),
("Artistas/ Cine/ Modernismo"),
("Ficción/ Modernismo");

-- Insertar las pinturas (con ejemplos de una categoría para ilustrar)
INSERT INTO paintings (category_id, title, description, information, details, img) VALUES
(1, "Ecos de Siluetas", "La pintura muestra una figura humana abstracta con tonos cálidos...", "70cm*40cm", "COP 90.000", "../assets/Echoes_of_Silhouettes.jpeg"),
(1, "Rayos de Serenidad", "La pintura titulada Rayos de Serenidad representa a una mujer joven...", "60cm*40cm", "COP 130.000", "../assets/Rays_of_Serenity.jpeg"),
(1, "Sombras de Soledad", "La pintura muestra una figura femenina de perfil...", "70cm*40cm", "COP 80.000", "../assets/Shadows_of_Loneliness.jpeg"),
(1, "Reflejos Desvanecidos", "La pintura muestra a una mujer arrodillada en una postura íntima...", "50cm*40cm", "COP 100.000", "../assets/Faded_Reflections.jpeg"),
(1, "Elegant Redwine", "Las pinceladas son gruesas y expresivas...", "40cm*50cm", "COP 100.000", "../assets/Elegant_RedWine.jpeg");
(2, "Elegant Redwine", "Las pinceladas son gruesas y expresivas...", "40cm*50cm", "COP 100.000", "../assets/Elegant_RedWine.jpeg");

-- Insertar un usuario en la tabla 'user'
INSERT INTO user (name, email, phone, password) 
VALUES ('Usuario1', 'usuario@example.com', '1234567890', '12345678User*');

-- Insertar un artículo en la tabla 'cart'
INSERT INTO cart (name, description, price, amount) 
VALUES ('Rays_of_Serenity', 'Una descripción breve sobre esa pintura', 130000, 1);
