<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="procesar_registro.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost:3306", "root", "", "usuarios");

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Escapar las entradas del formulario para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $dni = $conexion->real_escape_string($_POST["dni"]);
    $email = $conexion->real_escape_string($_POST["email"]);
    $password = $conexion->real_escape_string($_POST["password"]);

    // Consulta para insertar un nuevo usuario en la base de datos
    $consulta = "INSERT INTO usuario (nombre, dni, email, password) VALUES ('$nombre', '$dni', '$email', '$password')";

    if ($conexion->query($consulta) === TRUE) {
        echo "<p class='mensaje-exito'>Registro exitoso. <a href='login.php'>Iniciar sesión</a></p>";

    } else {
        echo "<div class='mensaje-error'>Error en el registro: <span class='mensaje-error-texto'>" . $conexion->error . "</span></div>";

    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
</body>
</html>

