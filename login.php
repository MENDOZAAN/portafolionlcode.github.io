<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "usuarios");

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Escapar las entradas del formulario para evitar inyecciones SQL
    $email = $conexion->real_escape_string($_POST["email"]);
    $password = $conexion->real_escape_string($_POST["password"]);

    // Consulta para verificar las credenciales
    $consulta = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows === 1) {
        // Inicio de sesión exitoso
        $_SESSION["email"] = $email;
        header("Location: menu.php"); // Redirigir al usuario a menu.php
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, intente de nuevo.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo">Bienvenido</h1>
        <h2 class="subtitulo">Iniciar sesión</h2>
        <form action="login.php" method="POST" class="formulario">
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="boton">Iniciar sesión</button>
        </form>
        <p class="enlace">¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
    </div>
</body>
</html>


