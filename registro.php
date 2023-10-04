<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="registro.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo">Registro</h1>
        <form action="procesar_registro.php" method="POST" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="campo">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="boton">Registrarse</button>
        </form>
        <p class="enlace">¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
    </div>
</body>
</html>

