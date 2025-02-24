
<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); // Oculta errores deprecados y avisos
ini_set('display_errors', 0); // No mostrar errores en la página

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario hace clic en "Cerrar sesión"
if (isset($_POST['logout'])) {
    // Eliminar el token de acceso y destruir la sesión
    unset($_SESSION['access_token']);
    session_destroy(); // Destruir toda la sesión

    // Redirigir a la página de inicio o principal (sin iniciar sesión)
    header("Location: principal.php");
    exit();
}

// Verificar si el usuario está autenticado
$usuario_autenticado = false;
$nombre = '';
$correo = '';

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    require_once 'config.php';
    $google_client->setAccessToken($_SESSION['access_token']);
    $google_service = new Google_Service_Oauth2($google_client);
    $google_user_info = $google_service->userinfo->get();

    // Obtener el nombre completo y correo del usuario
    $nombre = $google_user_info['name']; // Nombre completo
    $correo = $google_user_info['email']; // Correo electrónico
    $primer_nombre = explode(' ', $nombre)[0]; // Extraer el primer nombre
    $usuario_autenticado = true;
}
?>

<link rel="stylesheet" href="carrito.css">
<link rel="stylesheet" href="modal.css">
<nav>
<script src="principal.js"></script>
    <div class="header-publicidad" id="publicidad">
        <p>¡Adelanta tus compras de Navidad!  ❄️  ¿Qué estás esperando?  ❄️  Compra ya!!</p>
        <span class="material-symbols-rounded" onclick="clo()">
            close
        </span>
    </div>
</nav>

<div class="headertop">
    <nav class="navegador contenedor">
        <a href="principal.php">
            <img class="icon" src="dakcom.png" width="100px" alt="Logo DakCom">
        </a>
        <div class="buscador">
            <input type="text" name="" id="" placeholder="Buscar">
            <div class="icon-buscar"><i class="fa fa-search icon-buscar" aria-hidden="true"></i></div>
        </div>
        <ul class="nav contenedor">
            <li>
                <?php if ($usuario_autenticado): ?>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" id="userDropdown">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="carrito"><?php echo htmlspecialchars($primer_nombre); ?></span>
                    </a>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <p class="dropdown-item">Nombre: <?php echo htmlspecialchars($nombre); ?></p>
                        <p class="dropdown-item">Correo: <?php echo htmlspecialchars($correo); ?></p>
                        <form action="principal.php" method="POST" style="margin: 0;">
                            <button class="dropdown-item" type="submit" name="logout">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <a href="condiciones.php">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="carrito">Iniciar sesión</span>
                </a>
            <?php endif; ?>

            </li>
            <li>
                <a href="#" id="cartButton">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="carrito">Mi carrito</span>
                    <i class="fa fa-circle circulo" aria-hidden="true"></i>
                    <span id="cartCount" class="numero">0</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
    <nav class="all-cat ">
        <div class="contenedor nav2">
            <input type="checkbox" id="btn-menu">
            <li>
                <label for="btn-menu" onclick="menu()">
                    <i class="fa fa-bars" aria-hidden="true">
                    </i></label>
                <span>Todas las categorias</span>
                <ul class="submenu">
                    <label for="btn-menu">
                        <i class="fas fa-times-circle"></i></label>
                    <a href="">
                        <li>Componentes
                            <ul class="submenu2">
                                <a href="">
                                    <li>Ver todo Componentes</li>
                                </a>
                                <li class="subtitulos-cat">Componentes</li>
                                <a href="">
                                    <li>Procesador</li>
                                </a>
                                <a href="">
                                    <li>tarjeta grafica</li>
                                </a>
                                <a href="">
                                    <li>memorias ram</li>
                                </a>
                                <a href="">
                                    <li>placa madre</li>
                                </a>
                                <a href="">
                                    <li>disco duro</li>
                                </a>
                                <a href="">
                                    <li>fuente de poder</li>
                                </a>
                                <a href="">
                                    <li>gabinete</li>
                                </a>
                            </ul>
                    </a>
            </li>
            <a href="">
                <li>Ordenadores
                    <ul class="submenu2">
                        <a href="">
                            <li>ver todo ornedadores</li>
                        </a>
                        <li class="subtitulos-cat">laptops</li>
                        <a href="">
                            <li>laptop</li>
                        </a>
                        <li class="subtitulos-cat">pc's</li>
                        <a href="">
                            <li>pc</li>
                        </a>
                    </ul>
                </li>
            </a>
            <a href="">
                <li>Perifericos
                    <ul class="submenu2">
                        <a href="">
                            <li>ver todo perifericos</li>
                        </a>
                        <li class="subtitulos-cat">teclados</li>
                        <a href="">
                            <li>teclado</li>
                        </a>
                        <li class="subtitulos-cat">mouse</li>
                        <a href="">
                            <li>mouse</li>
                        </a>
                        <li class="subtitulos-cat">audifonos</li>
                        <a href="">
                            <li>audifonos</li>
                        </a>
                    </ul>
                </li>
            </a>
            <a href="">
                <li>Monitores
                    <ul class="submenu2">
                        <a href="">
                            <li>ver todo monitores</li>
                        </a>
                        <li class="subtitulos-cat">monitores</li>
                        <a href="">
                            <li>monitor</li>
                        </a>
                    </ul>
                </li>
            </a>
            <a href="">
                <li>Reguladores
                    <ul class="submenu2">
                        <a href="">
                            <li>ver todo reguladores</li>
                        </a>
                        <li class="subtitulos-cat">Reguladores</li>
                        <a href="">
                            <li>No-break</li>
                        </a>
                    </ul>
                </li>
            </a>
            <a href="">
                <li>Luces
                    <ul class="submenu2">
                        <a href="">
                            <li>ver todo Luces</li>
                        </a>
                        <li class="subtitulos-cat">Luces</li>
                        <a href="">
                            <li>Luces</li>
                        </a>
                    </ul>
                </li>
            </a>

        </div>
            


        <div class="nav21">
            <p>La mejor tienda online servicio, calidad y precio</p>
        </div>

        <div class="divinvisible"></div>
    </nav>

    <div id="carritoPopup" class="carrito-popup">
        <span id="cerrarCarrito" class="cerrar" 
              style="font-size: 2rem; color: #ffffff; position: absolute; top: 10px; right: 10px; cursor: pointer;background: #cf2500; padding:2px;
        ">
            &times;
        </span>
        
        <div class="carrito-contenido" id="carritoContenido">
                <p>No hay productos en el carrito.</p>
            </div>
            <div class="carrito-total">
                <span id="total">Total: $0.00</span><button style="background-color: #979696; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" onclick="vaciarCarrito()">Vaciar carrito</button>
        <button style="background-color: #3264d7; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;" onclick="pagarCarrito()">Pagar</button>
        
            </div>
        </div>
        
        <!-- Modal para los datos del cliente -->
        <div id="datosClienteModal" class="modal">
            <div class="modal-content">
                <span id="closeClienteModal" class="close">&times;</span>
                <h2>Datos del Cliente</h2>
                <form id="datosClienteForm">
                    <label for="nombreCliente">Nombre:</label>
                    <input type="text" id="nombreCliente" required>
                    <label for="emailCliente">Correo Electrónico:</label>
                    <input type="email" id="emailCliente" required>
                    <label for="direccionCliente">Dirección:</label>
                    <input type="text" id="direccionCliente" required>
                    <button type="button" onclick="confirmarPago()">Continuar</button>
                </form>
            </div>
        </div>
        
        <div id="metodoPagoModal" class="modal">
            <div class="modal-content">
                <span id="closeMetodoPagoModal" class="close">&times;</span>
                <h2>Seleccionar Método de Pago</h2>
        
                <!-- Formulario de pago -->
                <form id="paypal-login-form">
                    <div class="form-group">
                        <label for="paypal-email">Correo Electrónico de PayPal:</label>
                        <input type="email" id="paypal-email" name="paypal-email" required>
                    </div>
                    <div class="form-group">
                        <label for="paypal-password">Contraseña de PayPal:</label>
                        <input type="password" id="paypal-password" name="paypal-password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Iniciar sesión con PayPal</button>
                    </div>
                </form>
        
                <!-- Botón de PayPal -->
                <div id="paypal-button-container" style="display:none;"></div>
            </div>
        </div>
        
        <!-- Modal para mostrar el recibo de compra -->
        <!-- Modal para mostrar el recibo de compra -->
<!-- Modal de la factura -->
<!-- Modal para mostrar el recibo de compra -->
<div id="reciboModal" class="modal">
    <div class="modal-content">
        <span id="closeReciboModal" class="close">&times;</span>
        <h2 class="modal-title">Factura de Compra</h2>
        <div class="invoice-details">
            <div class="company-info">
                <h3>DAKCOM</h3>
                <img src="https://scontent.fgdl10-1.fna.fbcdn.net/v/t39.30808-6/466662247_122100579380616952_4804890565255133089_n.png?stp=dst-jpg&_nc_cat=108&ccb=1-7&_nc_sid=2285d6&_nc_ohc=cnNWApXscxwQ7kNvgGblHao&_nc_zt=23&_nc_ht=scontent.fgdl10-1.fna&_nc_gid=A1bnW6qwnDadG3LqS_qajDS&oh=00_AYDuUFTt2Brxz14JHquWSTiXFmVChHyxeNUvt6Kfi_oXZQ&oe=6755BBFE" alt="Logo DAKCOM" class="company-logo">
                <p>Dirección: Calle Ficticia 123</p>
                <p>Teléfono: 4494555444</p>
                <p>Email: dakcomweb@gmail.com</p>
            </div>
            <div class="invoice-info">
                <p><strong>Factura No:</strong> #12345</p>
                <p><strong>Fecha:</strong> <span id="fechaFactura"></span></p>
                <p><strong>Hora:</strong> <span id="horaFactura"></span></p>
                <p><strong>Cliente:</strong> Juan Pérez</p>
            </div>
        </div>
        <div id="reciboContenido" class="invoice-items">
            <!-- Aquí se generarán los items de la factura en tabla -->
        </div>
    </div>
</div>


        
</div>


<script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID"></script>
<script>

// Obtener la fecha y hora actual
const fechaActual = new Date();
const fechaFactura = fechaActual.toLocaleDateString(); // Formato de fecha
const horaFactura = fechaActual.toLocaleTimeString(); // Formato de hora 

    // Array para almacenar los productos en el carrito
let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

// Cerrar el carrito al hacer clic en la tacha
document.getElementById('cerrarCarrito').addEventListener('click', function () {
    document.getElementById('carritoPopup').style.display = 'none';
});

// Función para guardar el carrito en localStorage
function guardarCarritoEnLocalStorage() {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

// Función para agregar productos al carrito
function agregarAlCarrito(producto) {
    const productoExistente = carrito.find(item => item.nombre === producto.nombre);
    if (productoExistente) {
        productoExistente.cantidad += 1;
    } else {
        producto.cantidad = 1;
        carrito.push(producto);
    }
    guardarCarritoEnLocalStorage();
    actualizarCarrito();
}

// Función para actualizar el contador y mostrar el contenido del carrito
function actualizarCarrito() {
    const cartCount = document.getElementById('cartCount');
    cartCount.innerText = carrito.length > 0 ? carrito.length : '0';

    let carritoContenido = document.getElementById('carritoContenido');
    carritoContenido.innerHTML = '';
    let totalCarrito = 0;

    if (carrito.length === 0) {
        carritoContenido.innerHTML = '<p>No hay productos en el carrito.</p>';
    } else {
        carrito.forEach(producto => {
            const divProducto = document.createElement('div');
            divProducto.classList.add('producto-carrito');
            divProducto.innerHTML = `
                <img src="${producto.img}" alt="${producto.nombre}" class="producto-imagen">
                <div class="producto-info">
                    <h4>${producto.nombre}</h4>
                    <p>$${producto.precio}</p>
                    <p>Cantidad: 
                        <button class="cantidad-btn" onclick="modificarCantidad('${producto.nombre}', -1)">-</button>
                        ${producto.cantidad}
                        <button class="cantidad-btn" onclick="modificarCantidad('${producto.nombre}', 1)">+</button>
                    </p>
                    <p>Total: $${(producto.precio * producto.cantidad).toFixed(2)}</p>
                </div>
            `;
            carritoContenido.appendChild(divProducto);
            totalCarrito += producto.precio * producto.cantidad;
        });
    }

    const totalElemento = document.getElementById('total');
    totalElemento.innerText = `Total: $${totalCarrito.toFixed(2)}`;
}

// Función para modificar la cantidad de un producto en el carrito
function modificarCantidad(nombreProducto, cantidad) {
    const producto = carrito.find(item => item.nombre === nombreProducto);
    if (producto) {
        if (producto.cantidad + cantidad > 0) {
            producto.cantidad += cantidad;
        } else {
            carrito = carrito.filter(item => item.nombre !== nombreProducto);
        }
    }
    guardarCarritoEnLocalStorage();
    actualizarCarrito();
}

// Mostrar el carrito al hacer clic en "Mi carrito"
document.getElementById('cartButton').addEventListener('click', function() {
    let carritoDiv = document.getElementById('carritoPopup');
    carritoDiv.style.display = carritoDiv.style.display === 'block' ? 'none' : 'block';
});

// Función para vaciar el carrito
function vaciarCarrito() {
    carrito = [];
    guardarCarritoEnLocalStorage();
    actualizarCarrito();
    document.getElementById('carritoPopup').style.display = 'none';
}

// Función para generar el recibo al pagar
function pagarCarrito() {
    document.getElementById('carritoPopup').style.display = 'none';
    // Mostrar el modal para ingresar los datos del cliente
    document.getElementById('datosClienteModal').style.display = 'block';
}

// Cerrar el modal de los datos del cliente
document.getElementById('closeClienteModal').addEventListener('click', function () {
    document.getElementById('datosClienteModal').style.display = 'none';
});

// Mostrar el modal para seleccionar el método de pago
function mostrarMetodoPago() {
    // Validar los datos del cliente
    const nombreCliente = document.getElementById('nombreCliente').value;
    const emailCliente = document.getElementById('emailCliente').value;
    const direccionCliente = document.getElementById('direccionCliente').value;

    if (nombreCliente && emailCliente && direccionCliente) {
        // Guardar los datos del cliente (si es necesario)
        const cliente = { nombre: nombreCliente, email: emailCliente, direccion: direccionCliente };

        // Mostrar el modal para elegir el método de pago
        document.getElementById('datosClienteModal').style.display = 'none';
        document.getElementById('metodoPagoModal').style.display = 'block';

        // Mostrar el botón de PayPal
        mostrarBotonPaypal();
    } else {
        alert('Por favor, complete todos los campos');
    }
}

// Cerrar el modal del método de pago
document.getElementById('closeMetodoPagoModal').addEventListener('click', function () {
    document.getElementById('metodoPagoModal').style.display = 'none';
});
// Función para mostrar el botón de PayPal
function mostrarBotonPaypal() {
    const totalCompra = carrito.reduce((total, producto) => total + (producto.precio * producto.cantidad), 0);

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalCompra.toFixed(2)
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Pago realizado por ' + details.payer.name.given_name);
                confirmarPago(); // Llamar a la función para confirmar el pago y mostrar el recibo
            });
        },
        onCancel: function(data) {
            alert('Pago cancelado');
        }
    }).render('#paypal-button-container');
}

// Confirmar el pago y mostrar el recibo
// Confirmar el pago y mostrar el recibo
function confirmarPago() {
    // Cerrar el modal de método de pago
    document.getElementById('metodoPagoModal').style.display = 'none';

    // Mostrar el recibo de la compra
    let reciboContenido = document.getElementById('reciboContenido');
    reciboContenido.innerHTML = '<h3>Productos adquiridos</h3>';

    // Crear la tabla para mostrar los productos
    let tablaHTML = `
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
    `;

    carrito.forEach(producto => {
        tablaHTML += `
            <tr>
                <td>${producto.nombre}</td>
                <td>${producto.cantidad}</td>
                <td>$${producto.precio.toFixed(2)}</td>
                <td>$${(producto.precio * producto.cantidad).toFixed(2)}</td>
            </tr>
        `;
    });

    tablaHTML += `
            </tbody>
        </table>
    `;

    // Insertar la tabla en el contenido del recibo
    reciboContenido.innerHTML += tablaHTML;

    // Calcular el total de la compra
    const totalCompra = carrito.reduce((total, producto) => total + (producto.precio * producto.cantidad), 0);
    reciboContenido.innerHTML += `<p><strong>Total: $${totalCompra.toFixed(2)}</strong></p>`;

    // Simular actualización del inventario en la base de datos
    fetch('actualizar_inventario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(carrito),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Inventario actualizado:', data);
    })
    .catch(error => console.error('Error:', error));

    // Mostrar el modal del recibo
    document.getElementById('reciboModal').style.display = 'block';
}

// Cerrar el modal del recibo
document.getElementById('closeReciboModal').addEventListener('click', function () {
    document.getElementById('reciboModal').style.display = 'none';
});

// Inicializar carrito al cargar la página
actualizarCarrito();

// Modal de datos del cliente
var datosClienteModal = document.getElementById("datosClienteModal");
var closeClienteModal = document.getElementById("closeClienteModal");

// Función para cerrar el modal de datos del cliente
closeClienteModal.onclick = function() {
    datosClienteModal.style.display = "none";
}

// Modal de método de pago
var metodoPagoModal = document.getElementById("metodoPagoModal");
var closeMetodoPagoModal = document.getElementById("closeMetodoPagoModal");

// Función para cerrar el modal de método de pago
closeMetodoPagoModal.onclick = function() {
    metodoPagoModal.style.display = "none";
}
</script>