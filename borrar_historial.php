<?php
require_once 'bd_conection.php';

$sql = "DELETE FROM historial_compras";

if ($conn->query($sql) === TRUE) {
    header("Location: ventas.php?msg=historial_borrado");
} else {
    echo "Error al borrar historial: " . $conn->error;
}
$conn->close();
