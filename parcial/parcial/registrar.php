<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storetec";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$numero = $_POST["numero"];
$direccion = $_POST["direccion"];
$palabra_clave = $_POST["palabra_clave"];
$contraseña = $_POST["contraseña"];
$correo = $_POST["correo"];

// Consulta para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, numero, direccion, palabra_clave, contraseña, correo) 
        VALUES ('$nombre', '$numero', '$direccion', '$palabra_clave', '$contraseña', '$correo')";

if ($conn->query($sql) === TRUE) {
    // Registro exitoso, redirigir al lobby
    header("Location: lobby.html");
    exit();
} else {
    // Error al registrar, mostrar mensaje de error
    echo "Error al registrar: " . $conn->error;
}

$conn->close();
?>