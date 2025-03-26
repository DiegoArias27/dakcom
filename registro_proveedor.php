<?php
require_once 'bd_conection.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];

    $sql = "INSERT INTO proveedor (Nombre, Contacto) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $contacto);

    if ($stmt->execute()) {
        echo "<script>alert('Proveedor registrado exitosamente'); window.location.href='index.php';</script>";
    } else {
        echo "Error al registrar el proveedor: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
