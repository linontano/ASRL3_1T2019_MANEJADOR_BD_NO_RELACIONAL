
<!doctype html>
<?php session_start(); 
      require_once __DIR__ . "/vendor/autoload.php";
      $_id = new MongoDB\BSON\ObjectId($_GET["id"]);
      $kind = $_GET["kind"];
      include "php/obtenerInfo.php";//devuelve response de BSON $response array
      $name =  $response["Nombre"]; //$sp_info 
      

      
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Album · musiKdi</title>

    

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
    
    <?php include "php/topnav.php";?>
  </head>
  <body>
  <div class="container mt-5 pt-5">
    <div class="row">
      <h2 class="ppbold mb-2">Álbum</h2>
    </div>
    <div class = "row">
      <div class = "col-3 mr-5 text-center">
      
        <img class = "img-thumbnail" src="<?php echo $response["imgurl"];?>" alt="">
        <h4><?php echo $sp_info["alb_name"]; ?></h4>
      </div>
      <div class="col-7">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Spotify</a>
                        
            </div>
         </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php include "gapi/profileAlbumSP.php" ?></div>
                
            </div>
      </div>
    </div>
  </div>


<footer class="container mt-5 mb-4">
<p>&copy; <span class="ppbold">musiKdi</span> 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
