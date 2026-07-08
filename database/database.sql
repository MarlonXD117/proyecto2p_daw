CREATE DATABASE IF NOT EXISTS peliculas_db;
USE peliculas_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    rol ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    anio_lanzamiento INT NOT NULL,
    imagen VARCHAR(255) DEFAULT NULL,
    genero_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (genero_id) REFERENCES generos(id) ON DELETE CASCADE
);

-- Insertar un administrador por defecto (password: admin123)
INSERT IGNORE INTO usuarios (username, password, email, rol) 
VALUES ('admin', '$2y$10$FVAJoXXZbkT5UEINWUzdP.ZSvV1gm1UeaC8OOXyYwdXXZLA.arB8a', 'admin@admin.com', 'admin');

-- Insertar géneros iniciales
INSERT IGNORE INTO generos (nombre) VALUES ('Acción'), ('Comedia'), ('Drama'), ('Ciencia Ficción'), ('Terror');
