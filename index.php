<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DakCom</title>
    <script src="https://kit.fontawesome.com/141be34d11.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/png" href="icono.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <nav class="navegador contenedor">
        <img class="icon" src="dakcom.png" width="100px" alt="Logo DakCom">
            <div class="buscador">
                <input type="text" name="" id="" placeholder="En mantenimiento..." disabled>
                <div class="icon-buscar"><i class="fa fa-search icon-buscar" aria-hidden="true"></i></div>
            </div> 
        <ul class="nav contenedor">
            <li>
                <a href="login.html">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="carrito">Mi cuenta</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="carrito">Mi carrito</span>
                    <i class="fa fa-circle circulo" aria-hidden="true">
                    </i>
                    <span class="numero">0</span>
                    
                </a>
            </li>
        </ul>
        
    </nav>
    <nav class="all-cat ">
        <ul class="contenedor nav2">
            <input type="checkbox" id="btn-menu">
            <li>
                <label for="btn-menu">
                <i class="fa fa-bars" aria-hidden="true">
                </i></label>
                <span>Todas las categorias</span>
                <ul class="submenu">
                    <label for="btn-menu">
                    <i class="fas fa-times-circle"></i></label>
                    <a href="componentes.php"><li>Componentes
                        <ul class="submenu2">
                            <a href="componentes.php"><li>Ver todo Componentes</li></a>
                            <li class="subtitulos-cat">Componentes</li>
                            <a href="procesadores.php"><li>Procesador</li></a>
                            <a href="tarjetas-graficas.php"><li>tarjeta grafica</li></a>
                            <a href="memorias-ram.php"><li>memorias ram</li></a>
                            <a href="placas-base.php"><li>placa madre</li></a>
                            <a href="discos-duros.php"><li>disco duro</li></a>
                            <a href="fuentes-de-poder.php"><li>fuente de poder</li></a>
                            <a href="gabinetes.php"><li>gabinete</li></a>
                        </ul></a>
                    </li>
                    <a href="ordenadores.php"><li>Ordenadores
                        <ul class="submenu2">
                            <a href="ordenadores.php"><li>ver todo ornedadores</li></a>
                            <li class="subtitulos-cat">laptops</li>
                            <a href="portatiles.php"><li>laptop</li></a>
                            <li class="subtitulos-cat">pc's</li>
                            <a href="sobremesa.php"><li>pc</li></a>
                        </ul>
                    </li></a>
                    <a href="perifericos.php"><li>Perifericos
                        <ul class="submenu2">
                            <a href="perifericos.php"><li>ver todo perifericos</li></a>
                            <li class="subtitulos-cat">teclados</li>
                            <a href="teclados.php"><li>teclado</li></a>
                            <li class="subtitulos-cat">mouse</li>
                            <a href="ratones.php"><li>mouse</li></a>
                            <li class="subtitulos-cat">audifonos</li>
                            <a href="audifonos.php"><li>audifonos</li></a>
                        </ul>
                    </li></a>
                    <a href="monitores.php"><li>Monitores
                        <ul class="submenu2">
                            <a href="monitores.php"><li>ver todo monitores</li></a>
                            <li class="subtitulos-cat">monitores</li>
                            <a href="monitores.php"><li>monitor</li></a>
                        </ul>
                    </li></a>
                    <a href="tablets.php"><li>Tablets
                        <ul class="submenu2">
                            <a href="tablets.php"><li>ver todo tablets</li></a>
                            <li class="subtitulos-cat">tablets</li>
                            <a href="tablets.php"><li>tablet</li></a>
                        </ul>
                    </li></a>
                    <a href="celulares.php"><li>Celulares
                        <ul class="submenu2">
                            <a href="celulares.php"><li>ver todo celulares</li></a>
                            <li class="subtitulos-cat">celulares</li>
                            <a href="celulares.php"><li>celular</li></a>
                        </ul>
                    </li></a>

                </ul>
            </li>
            
    
            <div class="nav21">
                <p>La mejor tienda online servicio, calidad, precio</p>
            </div>
        </ul>
        
    </nav>

</head>
<body>
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
                    </div>
            <!--Inicio de navegacion manual-->
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
            <!--Fin de navegacion manual-->
            </div>
            <script type="text/javascript">
            var counter = 1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            }, 5000);
            </script>
        </div>
    <div class="subtitulos">
    <span><h2 class="normal">Algunas <strong class="negrita"> categorías</strong></h2></span></div></div>
        <div class="cont-cat">
            <div class="categoria">
            <a href="componentes.php" class="link">
                <img class="rdondear centrarimg" src="img/computadoras.png" alt="Computadoras">
                <h3 class="centrar">Componentes</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="monitores.php" class="link">
                <img class="rdondear centrarimg" src="img/monitor.png" alt="Monitores">
                <h3 class="centrar">Monitores</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="ordenadores.php" class="link">
                <img class="rdondear centrarimg" src="img/laptops.png" alt="Laptop">
                <h3 class="centrar">Ordenadores</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="celulares.php" class="link">
                <img class="rdondear centrarimg" src="img/celular.png" alt="Celulares">
                <h3 class="centrar">Celulares</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="perifericos.php" class="link">
                <img class="rdondear centrarimg" src="img/perifericos.png" alt="Perifericos">
                <h3 class="centrar">Perifericos</h3>
            </a>
            </div>
            <div class="categoria">
            <a href="tablets.php" class="link">
                <img class="rdondear centrarimg" src="img/tablet.png" alt="Tablet">
                <h3 class="centrar">Tablets</h3>
            </a>
            </div>
        </div>
        <div class="subtitulos">
            <span><h2 class="normal">Lo último <strong class="negrita"> en tecnología</strong></h2></span></div>

            <?php
            try{
                require_once('bd_conection.php');
                $sql = " SELECT Id_Categorias, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Fecha = 2020 ORDER BY RAND() LIMIT 6";
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
                            <a href="#" class="link">
                                <img class="rdondear centrarimg" src="<?php echo $productos['Img']; ?>" alt="Computadoras">
                                <div class="contenido-producto">
                                    <h3><?php echo $productos['Nombre_Producto'];?></h3>
                                    <p>$<?php echo $productos['Precio'] ?></p>
                                    <div class="ver-detalle">Ver detalle</div>
                                </div>
                                
                            </a>
                        </div>
                    <?php  }
                    
                ?>
                </div>
                </div>
                      
                
            
            </div>
            <?php
                $conn->close();
            ?>
        
        </div>
    </div>
    <div class="footer">
        <section>
            <h3>por qué comprar</h3>
            <p>cómo comprar</p>
            <p>preguntas frecuentes</p>
        </section>
        <section>
            <h3>quiénes somos</h3>
            <p>quiénes somos</p>
            <p>nuestras tiendas</p>
        </section>
        <section>
            <h3>Contactar</h3>
            <p>Centro de soporte</p>
            <p>Contacto</p>
        </section>
        <section>
            <h3>comunidad</h3>
            <p><i class="fab fa-instagram"></i>instagram</p>
            <p><i class="fab fa-twitter"></i>twitter</p>
            <p><i class="fab fa-facebook-square"></i>facebook</p>
        </section>
    </div>
    <div class="copy">
        <p>DakCom. Todos los derechos reservados &copy; 2020</p>
    </div>
    <a href="#top" >
        <div class="arriba">
            <i class="fas fa-angle-up"></i>
        </div>
    
    </a>
</body>
</html>