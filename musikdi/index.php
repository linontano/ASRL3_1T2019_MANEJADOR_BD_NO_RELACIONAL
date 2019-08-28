
<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lino, Ariana, Dario y Angelica">
    
    <title>Encuentra tu canción - musiKdi</title> 

    

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/personal.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link href="fonts/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">

	

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
  

    <style>
      .bd-placeholder-img {
		
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template <link href="jumbotron.css" rel="stylesheet"> -->
    
  </head>
  <body>
<?php include "php/topnav.php";?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
<?php 
  if (isset($_SESSION["Nombre"])){
?>
  <!--INICIO BUSQUEDA Y SALUDO---------------------------------------------------------->
  <div class="jumbotron text-center">
    <div class="container mt-5">
      <h1 class="display-3 ppbold">Hola<?php include "php/includeSession.php" ?>!</h1>
      <p class="fs-25">Encuentra las canciones que buscas aquí de tus plataformas favoritas.</p>
      <div class = "row justify-content-center align-items-center">
        <img class = "mr-5" width="48px" src="fonts/fontawesome-free/svgs/brands/spotify.svg">
        <img class = "mr-5" width="48px" src="fonts/fontawesome-free/svgs/brands/apple.svg">
        <img width="48px" src="fonts/fontawesome-free/svgs/brands/youtube.svg">
      </div>
      
	  </div>
	
    <div class = " d-flex justify-content-center mt-5 mb-5">
      <form class="form-inline col-sm-8" action="search.php" method="POST">
        <input class="form-control w-75" type="text" name="search" value="<?php echo $search; ?>" placeholder="Encuentra tus canciones, artistas y álbumes favoritos">
        <button class="btn btn-success w-25" type="submit">Buscar</button>
      </form>

    </div>
  </div>
  <!--FIN BUSQUEDA Y SALUDO---------------------------------------------------------->
  
  
<?php    
  }
  else{
?>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-success">
  <div class="col-md-8 p-lg-5 mx-auto my-5 mx-5 bg-light">
    <div class="ppbold fs-75 mt-3" href="#">musi<span class="logo">K</span>di</div>
    <img width="128px" src="fonts/fontawesome-free/svgs/solid/headphones-alt.svg">
    <h1 class="display-5 font-weight-normal">Encuentra tu música favorita</h1>
    <p class="lead font-weight-normal">En todas las plataformas musicales.*</p> <br>
    <a class="btn btn-outline-success mb-3" href="login.php">Inicia sesión y empieza a buscar</a>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<?php
}
?>
</main>




<footer class="container">
  <p>&copy; <span class="ppbold pb-4">musiKdi</span> 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
