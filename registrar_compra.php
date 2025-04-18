<?php
require_once 'bd_conection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    foreach ($data['productos'] as $producto) {
        $correo = $conn->real_escape_string($data['correo']);
        $nombre = $conn->real_escape_string($producto['nombre']);
        $cantidad = intval($producto['cantidad']);
        $total = floatval($producto['precio']) * $cantidad;
        $metodo_pago = $conn->real_escape_string($data['metodo_pago']);

        $sql = "INSERT INTO historial_compras (correo_comprador, nombre_producto, cantidad, total, metodo_pago)
                VALUES ('$correo', '$nombre', $cantidad, $total, '$metodo_pago')";

        $conn->query($sql);
    }
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}
