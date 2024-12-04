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
$correo = $_POST["correo"];
$palabra_clave = $_POST["palabra_clave"];

// Consulta para verificar el correo y la palabra clave
$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND palabra_clave='$palabra_clave'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Correo y palabra clave válidos, redirigir a la página para cambiar la contraseña
    // Puedes usar una variable de sesión para identificar al usuario en la siguiente página
    session_start();
    $_SESSION["correo"] = $correo;
    header("Location: cambiar_contraseña.html");
    exit();
} else {
    // Correo o palabra clave inválidos, mostrar mensaje de error
    echo "Correo electrónico o palabra clave incorrectos.";
}

$conn->close();
?>