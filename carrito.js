
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID"></script>


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
function confirmarPago() {
    // Cerrar el modal de método de pago
    document.getElementById('metodoPagoModal').style.display = 'none';

    // Mostrar el recibo de la compra
    let reciboContenido = document.getElementById('reciboContenido');
    reciboContenido.innerHTML = '<h3>Gracias por tu compra</h3>';
    carrito.forEach(producto => {
        reciboContenido.innerHTML += ` 
            <p>${producto.nombre} x ${producto.cantidad} - $${(producto.precio * producto.cantidad).toFixed(2)}</p>
        `;
    });

    const totalCompra = carrito.reduce((total, producto) => total + (producto.precio * producto.cantidad), 0);
    reciboContenido.innerHTML += `<p>Total: $${totalCompra.toFixed(2)}</p>`;

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

