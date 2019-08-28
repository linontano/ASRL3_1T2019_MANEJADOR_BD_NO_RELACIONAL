
<!doctype html>
<?php session_start(); //confirmLogin.php info
      require_once __DIR__ . "/vendor/autoload.php";
      if(!isset($_SESSION['user'])){
        header("Location: index.php");
      }
      $pf_name = $_SESSION['Nombre'];
      $pf_lname = $_SESSION['Apellidos'];
      $pf_user = $_SESSION['user'];
      $pf_mail = $_SESSION['email'];
      
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Jumbotron Template · Bootstrap</title>

    

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
  <div class="jumbotron mx-auto mt-4">
    <div class = " d-flex justify-content-center mt-4">
      <form class="form-inline col-sm-8" action="search.php" method="POST">
        <input class="form-control w-75" type="text" name="search" placeholder="Encuentra tus canciones, artistas y álbumes favoritos">
        <button class="btn btn-success w-25" type="submit">Buscar</button>
      </form>
    </div>
  	</div>

  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row mx-auto">
      <h1 class="ppbold">Perfil de Usuario</h1>
    </div>
    <div class="row mx-auto align-items-center">
      
      
      <div class = "col-5  bg-light">
        <p class ="ppbold fs-18"> Nombre </p>
        <p><?php echo $pf_name." ".$pf_lname ?></p>
        <p class ="ppbold fs-18"> Usuario </p>
        <p><?php echo $pf_user; ?> </p>
        <p class ="ppbold fs-18"> Correo </p>
        <p><?php echo $pf_mail; ?> </p>
        
      </div>
      <div class = "col-2 ml-auto mr-5">
        <img class = "" width="120px" src="fonts/fontawesome-free/svgs/solid/user-astronaut.svg">
      </div>
     
    </div>
    

    <div class="row mt-5 mx-auto">
      <h1 class="ppbold">Favoritos</h1>
    </div>
      <p>Aqui van tus favoritos.</p>
      
    
    

  </div> <!-- /container -->

</main>

<footer class="container mt-5 mb-4">
<p>&copy; <span class="ppbold">musiKdi</span> 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
