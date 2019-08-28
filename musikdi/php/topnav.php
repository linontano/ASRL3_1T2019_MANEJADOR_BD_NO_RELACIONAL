
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-darker">
  <div class="container mx-4">
  <a class="navbar-brand ppbold" href="index.php">musi<span class="logo">K</span>di</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  ppsbold" id="navbarsExampleDefault">
   
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio </a>
      </li>
<?php     
  if (isset($_SESSION["Nombre"])){
?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="search.php">Buscador</a>
          
        </div>
      </li>
<?php
  }
?>
      <li class="nav-item mr-4 ml-4 mt-2     text-white"><h5 class="align-middle">|</h5></li>
      <?php include "navSession.php"?>
      
    </ul>
    </div>
  </div>
  </div>
</nav>

<script>
function fav(){
    document.getElementById("fav").style.fill = "#ffc107";
    
}
</script>