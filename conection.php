<?php
$servername = "localhost";
$database = "dakcom";
$username = "root";
$password = "";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>