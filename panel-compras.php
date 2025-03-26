<?php
require_once 'bd_conection.php'; // Archivo para la conexión a la base de datos
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom</title>
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            text-align: center;
        }

        .menuIni a:hover {
            background-color: #575757;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            display: none;
        }

        .active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        .grafic {
            width: 400px;
        }

        .contenedorGrafic {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
        }
        .tabProdu{
            width: 90%;
        }
        .almacen{
            display: flex;
            flex-direction: row;
        }
        
    </style>
    <script>
        function showSection(sectionId) {
            let sections = document.querySelectorAll('.container');
            sections.forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
        }
        function hacerPedido(producto, proveedor) {
            let tablaPedidos = document.getElementById("tabla-pedidos");
            let row = tablaPedidos.insertRow(-1);
            let idPedido = Math.floor(Math.random() * 1000);
            let guia = Math.floor(Math.random() * 900000) + 100000;
            let fechaEntrega = new Date();
            fechaEntrega.setDate(fechaEntrega.getDate() + 7);
            row.innerHTML = `<td>${idPedido}</td><td>${producto}</td><td>${proveedor}</td><td>${fechaEntrega.toLocaleDateString()}</td><td>${guia}</td><td>En proceso</td>`;
            alert(`Pedido realizado: ${producto} con proveedor ${proveedor}`);
        }

        function filtrarProductos() {
        let input = document.getElementById("buscar").value.toLowerCase();
        let table = document.getElementById("tablaAlmacen");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let producto = rows[i].getElementsByTagName("td")[0].textContent.toLowerCase();
            if (producto.includes(input)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
    </script>
<body>
    
    

    <?php include 'header-principal.php'; ?>
    <h1 style="text-align: center;">Administrador de Compras</h1>
    <div class="menuIni">
        <a href="#" onclick="showSection('almacen')">Disponibilidad de Almacén</a>
        <a href="#" onclick="showSection('bajo-stock')">Productos Bajos en Stock</a>
        <a href="#" onclick="showSection('pedidos')">Pedidos</a>
        <a href="#" onclick="showSection('proveedor')">Proveedores</a>
    </div>

    
    <div id="almacen" class="container active">
        <h2>Disponibilidad de Almacén</h2>
        <input type="text" id="buscar" placeholder="Buscar producto..." onkeyup="filtrarProductos()" style="width: 100%; padding: 8px; margin-bottom: 10px;">
        <div class="almacen">
        <table class="tabProdu" id="tablaAlmacen">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
            <?php
        $sql = "SELECT Nombre_Producto, Cantidad FROM inventario";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['Nombre_Producto']}</td><td>{$row['Cantidad']}</td></tr>";
        }
        ?>
        </table>
        <?php
        // Definir el cupo máximo del almacén (ajústalo según tu necesidad)
        $cupo_maximo = 5000;

        // Obtener la cantidad total de productos en el almacén
        $sql = "SELECT SUM(Cantidad) AS total_productos FROM inventario";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_productos = $row['total_productos'] ?? 0; // Si es NULL, asignar 0

        // Calcular espacio disponible
        $espacio_disponible = max($cupo_maximo - $total_productos, 0);
        ?>

        <div class="contenedorGrafic">
    <div class="grafic">
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Ocupado', 'Disponible'],
                        datasets: [{
                            data: [<?= $total_productos ?>, <?= $espacio_disponible ?>],
                            backgroundColor: [
                                'rgb(92, 21, 62)', // Color para ocupado
                                'rgb(30, 125, 151)' // Color para disponible
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        }
                    }
                });
            });
        </script>
    </div>
    </div>
</div>

    </div>

    <div id="bajo-stock" class="container">
        <h2>Productos Bajos en Stock</h2>
        <table>
            <?php
            $sql = "SELECT p.Nombre_Producto, p.Cantidad, pro.Nombre FROM inventario p, proveedor pro WHERE p.Cantidad >= 50";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Nombre_Producto']}</td><td class='low-stock'>{$row['Cantidad']}</td><td>{$row['Nombre']}</td><td><button onclick=\"hacerPedido('{$row['Nombre_Producto']}', '{$row['Nombre']}')\">Hacer Pedido</button></td></tr>";
            }
            ?>
        </table>
    </div>
    
    <div id="proveedor" class="container">
        <h2>Proveedores</h2>
        <table>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
        </tr>
            <?php
            $sql = "SELECT Nombre, Contacto FROM proveedor";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Nombre']}</td><td>{$row['Contacto']}</td></tr>";
            }
            ?>
        </table>
        <h3>Registrar Nuevo Proveedor</h3>
        <form action="registro_proveedor.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del proveedor" required>
            <input type="text" name="contacto" placeholder="Contacto" required>
            <button type="submit">Registrar</button>
        </form>
    </div>
    <div id="pedidos" class="container">
        <h2>Pedidos</h2>
        <table id="tabla-pedidos">
            <tr>
                <th>ID Pedido</th>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Fecha Estimada</th>
                <th>Número de Guía</th>
                <th>Estado</th>
            </tr>
        </table>
    </div>

    
    
    
</body>

</html>