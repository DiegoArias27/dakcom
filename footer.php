<link rel="stylesheet" href="style.css">


<div class="footer">
    <section>
        <h3>por qué comprar</h3>
        <p onclick="mostrarModal('comoComprar')">cómo comprar</p>
        <p onclick="mostrarModal('faq')">preguntas frecuentes</p>
    </section>
    <section>
        <h3>quiénes somos</h3>
        <p onclick="mostrarModal('quienesSomos')">quiénes somos</p>
        <p onclick="mostrarModal('nuestrasTiendas')">nuestras tiendas</p>
    </section>
    <section>
        <h3>Contactar</h3>
        <p onclick="mostrarModal('centroSoporte')">Centro de soporte</p>
        <p onclick="mostrarModal('contacto')">Contacto</p>
    </section>
    <section>
        <h3>comunidad</h3>
        <a href="https://www.instagram.com/dakcomweb?utm_source=qr">
            <p><i class="fab fa-instagram"></i>instagram</p>
        </a>
        <a href="https://www.instagram.com/dakcomweb?utm_source=qr">
            <p><i class="fab fa-facebook-square"></i>facebook</p>
        </a>
    </section>
</div>
<div class="copy">
    <p>DakCom. Todos los derechos reservados &copy; 2024</p>
</div>

<!-- Modals -->
<div id="comoComprarModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('comoComprar')">&times;</span>
        <h2>Cómo comprar</h2>
        <p>1: Busca el producto ideal conforme a tu necesidad
                <br>2: En la parte inferior del producto seleccione la opcion "Agregar al carrito"
                <br>3: En la parte superior derecha aparece el logo del carrito "Mi carrito" de clic y seleccione "Pagar" o "Vaciar carrito"
                <br>4: Complete el formulario con sus datos y de clic en continuar
                <br>5: Inicie sesion con Paypal para realizar el pago.</p>
    </div>
</div>
<div id="faqModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('faq')">&times;</span>
        <h2>Preguntas frecuentes</h2>
        <p>1: ¿Cuánto tarda en llegar el producto?
        <br>  R: Alrededor de una o dos semanas
        <br>    2: ¿Qué metodos de pago manejan?
        <br>    R: Unicamente Paypal
        <br>    3: ¿Cuentan con tienda fisica?
        <br>    R: No, somos una tienda 100% en linea.</p>
    </div>
</div>
<div id="quienesSomosModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('quienesSomos')">&times;</span>
        <h2>Quiénes somos</h2>
        <p> Nuestra empresa se basa en la venta de productos basados en componentes para cambio, renovacion o creacion de equipos de cómputo
        <br>   Objetivo: Consolidar nuestra posición en el mercado como una empresa líder en la venta de componentes de cómputo,
        <br>  ofreciendo productos de alta calidad y un servicio al cliente excepcional, mientras fomentamos la innovación y
        <br>  la sostenibilidad en todas nuestras operaciones
        <br>     Mision: Brindar soluciones innovadoras y de alta calidad en componentes de cómputo que satisfagan las necesidades tecnológicas de 
        <br>      nuestros clientes, a través de un servicio excepcional y un compromiso con la excelencia.
        <br>     Vision: Ser el proveedor líder a nivel nacional en componentes de cómputo, reconocido por nuestra capacidad de adaptarnos a las 
        <br>     tendencias del mercado, nuestra atención al cliente y nuestro impacto positivo en la comunidad tecnológica. </p>
    </div>
</div>
<div id="nuestrasTiendasModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('nuestrasTiendas')">&times;</span>
        <h2>Nuestras tiendas</h2>
        <p>Solamente somos tienda en linea, no contamos con tiendas fisicas</p>
    </div>
</div>
<div id="centroSoporteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('centroSoporte')">&times;</span>
        <h2>Centro de soporte</h2>
        <p>Estamos aquí para ayudarte con cualquier duda o problema.</p>
    </div>
</div>
<div id="contactoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal('contacto')">&times;</span>
        <h2>Contacto</h2>
        <p>Escríbenos a <a href="mailto:contacto@dakcom.com">contacto@dakcom.com</a> para más información.</p>
        
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram DakCom" style="width: 50px; height: 50px;">
        </a>
    </div>
</div>



    <script src="app.js"></script>
    <script>
        function mostrarModal(modalId) {

    document.getElementById(`${modalId}Modal`).style.display = "block";
}

function cerrarModal(modalId) {
    document.getElementById(`${modalId}Modal`).style.display = "none";
}

// Cerrar modal al hacer clic fuera de este
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
};

    </script>