<?php
$data = json_decode(file_get_contents("php://input"), true);

$correoCliente = $data['correo'];
$nombreCliente = $data['nombre'];
$direccionCliente = $data['direccion'];
$productos = $data['productos'];
$fechaEntrega = date('d/m/Y', strtotime('+5 days'));

// Construir cuerpo del mensaje
$mensaje = '
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        h2 {
            color: #0a58ca;
        }
        .section-title {
            margin-top: 30px;
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #0a58ca;
            color: white;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gracias por tu compra, ' . htmlspecialchars($nombreCliente) . '.</h2>
        <p>Tu pedido ha sido recibido correctamente. A continuación te mostramos los detalles:</p>

        <div class="section-title">Información del cliente</div>
        <p><strong>Nombre:</strong> ' . htmlspecialchars($nombreCliente) . '</p>
        <p><strong>Correo electrónico:</strong> ' . htmlspecialchars($correoCliente) . '</p>
        <p><strong>Dirección:</strong> ' . htmlspecialchars($direccionCliente) . '</p>

        <div class="section-title">Detalle de productos</div>
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>';
$total = 0;
foreach ($productos as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $total += $subtotal;
    
    $mensaje .= '
                <tr>
                    <td><img src="' . htmlspecialchars($producto['img']) . '" alt="' . htmlspecialchars($producto['nombre']) . '" width="60"></td>
                    <td>' . htmlspecialchars($producto['nombre']) . '</td>
                    <td>' . $producto['cantidad'] . '</td>
                    <td>$' . number_format($producto['precio'], 2) . '</td>
                    <td>$' . number_format($subtotal, 2) . '</td>
                </tr>';
}

$mensaje .= '
            </tbody>
        </table>
        <p><strong>Total de la compra: $' . number_format($total, 2) . '</strong></p>

        <div class="section-title">Fecha estimada de entrega</div>
        <p>' . $fechaEntrega . '</p>

        <div class="footer">
            <p>Si tienes alguna duda o consulta, contáctanos a <a href="mailto:dakcomweb@gmail.com">dakcomweb@gmail.com</a>.</p>
            <p>Gracias por confiar en <strong>DAKCOM</strong>.</p>
        </div>
    </div>
</body>
</html>';


// Encabezados del correo
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: diegoarias0314@gmail.com";

// Enviar correo
mail($correoCliente, "Confirmación de compra - DAKCOM", $mensaje, $headers);

// Respuesta
echo json_encode(["success" => true]);
?>
