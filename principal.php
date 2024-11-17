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
                $sql = " SELECT Id_Categorias, Nombre_categoria, Tipo, Nombre_Producto, Precio, Descripcion, Especificaciones, Fecha, Img FROM inventario INNER JOIN categorias WHERE inventario.Id_cat = categorias.ID AND Fecha >= 2019 ORDER BY RAND() LIMIT 8";
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
    <div class="contenedor-emergente">
        <div class="emergenteTC">
            <h4>TÉRMINOS Y CONDICIONES</h4>
            <p class="actualizacion">Este documento fue modificado por última vez el 14 de noviembre del 2024.</p>
            <p>El presente contenido regula los términos y condiciones generales aplicables al uso de los contenidos,
                productos y servicios ofrecidos a través del sitio web Dakcomweb. Toda persona que pretenda acceder o
                utilizar el sitio web y los servicios ofrecidos en él, podrá hacerlo únicamente sujeto a los TÉRMINOS Y
                CONDICIONES aquí establecidos, así como, a las políticas y principios incorporados en el presente
                documento,
                en todo caso aquella persona que no acepte los TÉRMINOS Y CONDICIONES vigentes deberá abstenerse de
                utilizar el
                sitio web y/o adquirir los productos y servicios que eventualmente sean ofrecidos en el mismo</p>
            <div class="contenido" id="contenido">
                <div style="height: 600px;">
                <p>
                    1. Aceptación de los términos
                    Al acceder y utilizar Dakcomweb, aceptas los siguientes términos y condiciones. Si no estás de
                    acuerdo, te pedimos que no utilices nuestro sitio.
                    <br>
                    <br>
                    2. Uso de la página
                    Esta página está destinada a la compra y consulta de información sobre componentes de computadora.
                    Cualquier uso indebido de la página que viole estos términos puede resultar en la suspensión o
                    prohibición de acceso.
                    <br>
                    <br>
                    3. Registro de usuario
                    Para realizar compras, puede que sea necesario registrarse. Te comprometes a proporcionar
                    información precisa y actualizada. Mantener la confidencialidad de tu cuenta es tu responsabilidad.
                    <br>
                    <br>
                    4. Productos y disponibilidad
                    Todos los productos mostrados están sujetos a disponibilidad y pueden cambiar sin previo aviso. Nos
                    reservamos el derecho de limitar la cantidad de productos disponibles por cliente.
                    <br>
                    <br>
                    5. Precios
                    Los precios de los productos están expresados en pesos mexicanos, incluyen impuestos. Nos reservamos
                    el derecho de modificar precios sin previo aviso. El precio que aparece al momento de la compra será
                    el precio final.
                    <br>
                    <br>
                    6. Proceso de compra
                    Para realizar una compra, sigue las instrucciones proporcionadas en la página. Asegúrate de
                    verificar los detalles antes de confirmar tu pedido. No nos hacemos responsables de errores de
                    usuario en el proceso de compra.
                    <br>
                    <br>
                    7. Envío y entrega
                    Ofrecemos envíos a toda la república mexicana. Los tiempos de entrega son estimados y pueden variar.
                    No nos hacemos responsables de retrasos causados por factores externos como servicios de paquetería
                    o condiciones climáticas.
                    <br>
                    <br>
                    8. Garantías y devoluciones
                    Los productos vendidos tienen garantía de 30 días hábiles a la entrega del mismo. Las devoluciones
                    son aceptadas bajo ciertos términos, como defectos de fabricación. Para más detalles, consulta
                    nuestra política de garantías y devoluciones.
                    <br>
                    <br>
                    9. Propiedad intelectual
                    Todo el contenido en esta página, incluyendo imágenes, logos y descripciones, es propiedad de Dakcomweb 
                    y está protegido por derechos de autor. Algunas imágenes de productos han sido obtenidas de Google y 
                    pertenecen a sus respectivos propietarios. No está permitido su uso sin autorización.
                    <br>
                    <br>
                    10. Privacidad
                    Manejamos la información personal de acuerdo con nuestra Política de Privacidad. La información
                    proporcionada solo será utilizada para procesar pedidos y mejorar la experiencia de usuario.
                    <br>
                    <br>
                    11. Modificaciones de términos
                    Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Los
                    cambios serán efectivos una vez publicados en la página.
                    <br>
                    <br>
                    12. Limitación de responsabilidad
                    Dakcomweb no se hace responsable por daños indirectos, incidentales o consecuentes relacionados con
                    el uso de nuestra página o productos.
                    <br>
                    <br>
                    <br>
                </p>
                </div>
            </div>
            <div class="btnaceptar">
            <button id="aceptar" disabled >Aceptar</button>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <a href="#top">
        <div class="arriba">
            <i class="fas fa-angle-up"></i>
        </div>

    </a>

    <script src="principal.js"></script>
</body>

</html>