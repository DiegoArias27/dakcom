<div class="subtitulos">
    <span>
        <h2 class="normal">Productos <strong class="negrita"> que te podrian gustar</strong></h2>
    </span>
</div>

<?php
try {
    // Consulta SQL para productos relacionados
    $tipo_producto = $producto['Nombre_categoria']; // Almacena el tipo del producto
    $sql = "SELECT Id_Categorias, Nombre_categoria, TRIM(Tipo) as Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img 
            FROM inventario 
            INNER JOIN categorias 
            ON inventario.Id_cat = categorias.ID 
            WHERE Nombre_categoria = ? 
            ORDER BY RAND() LIMIT 4";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tipo_producto); // Se usa "s" porque Tipo es una cadena de texto
    $stmt->execute();
    $resultado = $stmt->get_result();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<div class="array">
    <div class="cont-cat">
        <?php
        
            while ($productos = $resultado->fetch_assoc()) { 
    
                
                ?>
        <div class="productos">
            <a href="producto.php?id=<?php echo $productos['Id_Categorias']; ?>" class="link">
                <div class="tamañoimagen">
                    <img class="rdondear centrarimg" src="<?php echo $productos['Img']; ?>" alt="Computadoras">
                </div>
                <div class="contenido-producto" id="contenido">
                    <h3>
                        <?php echo $productos['Nombre_Producto'];?>
                    </h3>
                    <p>$
                        <?php echo $productos['Precio'] ?>
                    </p>
                    <div class="ver-detalle">Ver detalle</div>
                </div>

            </a>
        </div>
        <?php  }
            
        ?>
    </div>
</div>