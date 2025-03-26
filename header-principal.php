<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logout'])) {
    unset($_SESSION['access_token']);
    session_destroy();
    header("Location: principal.php");
    exit();
}

$usuario_autenticado = false;
$nombre = '';
$correo = '';
$es_admin = false;

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    require_once 'config.php';
    $google_client->setAccessToken($_SESSION['access_token']);
    $google_service = new Google_Service_Oauth2($google_client);
    $google_user_info = $google_service->userinfo->get();

    $nombre = $google_user_info['name'];
    $correo = $google_user_info['email'];
    $primer_nombre = explode(' ', $nombre)[0];
    $usuario_autenticado = true;

    if ($correo === "diegoarias0314@gmail.com") {
        $es_admin = true;
    }
}
?>

<link rel="stylesheet" href="carrito.css">
<link rel="stylesheet" href="modal.css">
<nav>
<script src="principal.js"></script>
    <div class="header-publicidad" id="publicidad">
        <p>¡Adelanta tus compras de Navidad! ❄️ ¿Qué estás esperando? ❄️ Compra ya!!</p>
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
                        <a href="panel-compras.php" onclick="showSection('panel-compras')" class="dropdown-item">Compras</a>
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



<script>
    // Función para mostrar/ocultar el menú desplegable
    document.querySelector('#userDropdown').addEventListener('click', function(event) {
      event.preventDefault(); // Prevenir la acción predeterminada del enlace
      var dropdown = document.querySelector('.dropdown');
      dropdown.classList.toggle('active');
    });
  
    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function(event) {
      var dropdown = document.querySelector('.dropdown');
      if (!dropdown.contains(event.target) && !event.target.closest('#userDropdown')) {
        dropdown.classList.remove('active');
      }
    });
  </script>
  