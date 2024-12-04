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
$username = $_POST["username"];
$password = $_POST["password"];

// Consulta para verificar el usuario
$sql = "SELECT * FROM usuarios WHERE usuario='$username' AND contraseña='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario válido, redirigir al lobby
    header("Location: lobby.html");
    exit();
} else {
    // Usuario inválido, mostrar mensaje de error
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>