<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=close" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <?php include 'header-principal.php'; ?>
</head>

<body>
    <?php
    try {
        // Conexión a la base de datos
        require_once('bd_conection.php');

        // Verificar si el ID está presente en la URL y es válido
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            die("ID de producto no válido.");
        }

        // Obtener el ID del producto
        $id_producto = intval($_GET['id']);

        // Consulta SQL para buscar el producto por ID
        $sql = "SELECT Id_Categorias, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img 
                FROM inventario 
                INNER JOIN categorias 
                ON inventario.Id_cat = categorias.ID 
                WHERE inventario.Id_Categorias = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificar si se encontró el producto
        if ($resultado->num_rows === 0) {
            die("Producto no encontrado.");
        }

        // Obtener los datos del producto
        $producto = $resultado->fetch_assoc();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
    <div class="contenedor2">
        <div class="navegacionSecundaria">
            <a class="linknavegacionsecundaria" href="principal.php">Inicio</a>
            <span class="material-symbols-outlined">
                chevron_right
            </span>
            <a class="linknavegacionsecundaria" href="principal.php"><?php echo htmlspecialchars($producto['Nombre_categoria']); ?></a>
            <span class="material-symbols-outlined">
                chevron_right
            </span>
            <a class="linknavegacionsecundaria" href="principal.php"><?php echo htmlspecialchars($producto['Tipo']); ?></a>
        </div>
        <div class="caracteristicas">
            <div class="imgProducto">
                <img src="<?php echo htmlspecialchars($producto['Img']); ?>" alt="" id="zoomimage" onclick="zoom()">
            </div>
            <div class="detalles-producto">
                <div class="articulo">
                    <h1><?php echo htmlspecialchars($producto['Nombre_Producto']); ?></h1>
                </div>
                <div class="vendido">
                    <p>Vendido y enviado por <strong>dakcom</strong></p>
                </div>
                <div class="precio">
                    <p>$<?php echo htmlspecialchars($producto['Precio']); ?></p>
                </div>
                <div class="descripcion">
                    <p>
                        <?php echo htmlspecialchars($producto['Descripcion']); ?>
                    </p>
                </div>
                <div class="especificaciones">
                    <span>Especificaciones</span>
                    <p>
                        <?php echo htmlspecialchars($producto['Especificaciones']); ?>
                    </p>
                </div>

            </div>
            <div class="detalles-pago">
                <div class="borde">
                    <div class="precio">
                        <p>$<?php echo htmlspecialchars($producto['Precio']); ?></p>
                    </div>
                    <div class="disponibilidad">
                        <span class="material-symbols-outlined">
                            storefront
                        </span>
                        <p>Disponible</p>
                    </div>
                    <div class="envio">
                        <span class="material-symbols-outlined">
                            local_shipping
                        </span>
                        <p>Envío <strong>Gratis</strong></p>
                    </div>
                    <div class="ubicacion">
                        <span class="material-symbols-outlined">
                            location_on
                        </span>
                        <p>Enviar a José, Aguascalientes, 20010</p>
                    </div>
                    <div class="cantidad">
                        <p>Cantidad: </p>
                        <select name="cant" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="btn-añadir" onclick="agregarAlCarrito({
                        nombre: '<?php echo addslashes($producto['Nombre_Producto']); ?>',
                        precio: <?php echo htmlspecialchars($producto['Precio']); ?>,
                        img: '<?php echo addslashes($producto['Img']); ?>'
                    })">
                        <p>Agregar al carrito</p>
                    </div>
                    
                    
                    
                    <div class="btn-comprar">
                        <p>Comprar ahora</p>
                    </div>
                </div>
            </div>
        </div>

        
        <?php include 'productos-relacionados.php'; ?>

        <?php include 'productos-que-te-podrian-gustar.php'; ?>

        <?php include 'footer.php'; ?>

        <?php include 'asistente.php'; ?>


</body>

</html>