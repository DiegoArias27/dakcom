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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=close" />
    <link rel="stylesheet" href="style.css">

    
    <?php include 'header-principal.php'; ?>

</head>

<body>
    <!--.................... -->
    <div id="#top"></div>
    <div class="contenedor2">
        <div><!--SLIDER-->
            <div class="id">
                <div class="slider1">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <!--inicio de slider-->
                        <div class="slide first">
                            <img src="img/banner2.jpg" alt="img1" class="im1">
                        </div>
                        <div class="slide">
                            <img src="img/banner3.jpg" alt="img2" class="im1">
                        </div>
                        <div class="slide">
                            <img src="img/banner4.jpg" alt="img3" class="im1">
                        </div>
                        <div class="slide">
                            <img src="img/landing.jpg" alt="img4" class="im1">
                        </div>
                        <!--Fin de slider-->
                        <!--Inicio de Navegacion-->
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                        <!--Fin de navegacion-->

                        <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                    </div>
                    <!--Inicio de navegacion manual-->
                    
                    <!--Fin de navegacion manual-->
                </div>
                <script type="text/javascript">
                    var counter = 1;
                    setInterval(function () {
                        document.getElementById('radio' + counter).checked = true;
                        counter++;
                        if (counter > 4) {
                            counter = 1;
                        }
                    }, 9000);
                </script>
            </div>
            <div class="subtitulos">
                <span>
                    <h2 class="normal">Algunas <strong class="negrita"> categorías</strong></h2>
                </span>
            </div>
        </div>
        <div class="cont-cat">
            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/computadoras.png" alt="Computadoras">
                    <h3 class="centrar">Componentes</h3>
                </a>
            </div>
            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/monitor.png" alt="Monitores">
                    <h3 class="centrar">Monitores</h3>
                </a>
            </div>
            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/laptops.png" alt="Laptop">
                    <h3 class="centrar">Ordenadores</h3>
                </a>
            </div>

            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/perifericos.png" alt="Perifericos">
                    <h3 class="centrar">Perifericos</h3>
                </a>
            </div>
            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/no-break.jpg" alt="No-Break">
                    <h3 class="centrar">No-Break</h3>
                </a>
            </div>
            <div class="categoria">
                <a href="" class="link">
                    <img class="rdondear centrarimg" src="img/tirasled.png" alt="Luces">
                    <h3 class="centrar">Luces</h3>
                </a>
            </div>
        </div>
        <div class="subtitulos">
            <span>
                <h2 class="normal">Lo último <strong class="negrita"> en tecnología</strong></h2>
            </span>
        </div>

        <?php
            try{
                require_once('bd_conection.php');
                $sql = " SELECT Id_Categorias, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Fecha >= 2022 ORDER BY RAND() LIMIT 8";
                $resultado = $conn->query($sql); 
            } catch (\Eception $e){
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


        <div class="subtitulos">
            <span>
                <h2 class="normal">Marcas<strong class="negrita"> más vendidas</strong></h2>
            </span>
        </div>
        <div class="cont-cat">
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/Asus-Logo.png" alt="Computadoras">
                </a>
            </div>
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/Msi_Logo.png" alt="Monitores">
                </a>
            </div>
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/razer-logo.jpg" alt="Laptop">
                </a>
            </div>
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/ogimg-logo.png" alt="Celulares">
                </a>
            </div>
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/ryzen-logo-amd-linux.jpg" alt="Perifericos">
                </a>
            </div>
            <div class="categoria2">
                <a href="" class="link">
                    <img class="centrarimg" src="img/hyperx.png" alt="Tablet">
                </a>
            </div>
        </div>
    </div>

    </div>

    <?php
                $conn->close();
            ?>
    </div>

    </div>
    
    <?php include 'footer.php'; ?>
    
    <?php include 'asistente.php'; ?>


    

    
</body>

</html>