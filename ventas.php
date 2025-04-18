<?php
require_once 'bd_conection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Ventas - DakCom</title>
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #28a745;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .menuIni {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .menuIni a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
        }

        .menuIni a:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>

<?php include 'header-principal.php'; ?>

<h1>Historial de Compras</h1>

<div class="menuIni">
    <a href="principal.php">Inicio</a>
    <a href="ventas.php">Ventas</a>
    <a href="panel-compras.php">Compras</a>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo del Comprador</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Método de Pago</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM historial_compras ORDER BY fecha DESC";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['correo_comprador']}</td>
                        <td>{$row['nombre_producto']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>$ {$row['total']}</td>
                        <td>{$row['fecha']}</td>
                        <td>{$row['metodo_pago']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align: center;'>No hay compras registradas.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'historial_borrado'): ?>
    <p style="color: green; font-weight: bold; text-align: center;">✅ Historial de compras eliminado correctamente.</p>
<?php endif; ?>

<div style="text-align: center; margin: 15px 0;">
    <form action="borrar_historial.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas borrar TODO el historial de compras?');" style="display: inline-block;">
        <button type="submit" style="
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 999px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        ">
            🗑 Borrar Historial
        </button>
    </form>
</div>




</body>
</html>
