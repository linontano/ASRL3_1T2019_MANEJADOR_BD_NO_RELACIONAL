<?php
    
    if (isset($_SESSION["Nombre"])){
?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenido <?php echo $_SESSION["Nombre"] ?> </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="profile.php">Perfil</a>
          <a class="dropdown-item" href="php/closeSession.php">Cerrar Sesión</a>
        </div>
    </li>

<?php
    }
    else{
?>
    <li class="nav-item"> <a class="nav-link" href="register.php">Registrarse </a> </li>
    <li class="nav-item"> <a class="nav-link" href="login.php">Iniciar sesión</a>  </li>
<?php

    }

?>