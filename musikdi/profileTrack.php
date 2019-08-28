
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
    <title>Track · musiKdi</title>

    

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
      <h1 class="ppbold">Track</h1>
    </div>
    <div class="row justify-content-md-center align-items-center">
        <div class="col-3 ">
            <img class ="img-thumbnail rounded-lg" src="<?php echo $response["imgurl"];?>">
        </div>

        <div class = "col-3">
            <button onClick="fav()"><svg width="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path id="fav" class="star-off" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></button>
            <h3><?php echo $name; ?> </h3>

            <p><b>  <?php 
                        
                        $str_art =""; 
                        foreach($rartistas as $rart)  {
                            $str_art = $str_art.", <a href='profileArtist.php?id=".$rart[0]["_id"]."&kind=artist'>".$rart[0]["Nombre"]."</a>";
                        }
                        echo substr($str_art,1);
                    ?>
                </b><br>
                <?php if(isset($ralbum)){?>
            <b>Álbum: </b> <?php echo $ralbum["Nombre"];}?></p>
        </div>
      
    </div>
    

    <div class="row mt-5 mx-auto">
      <h1 class="ppbold">Contenido</h1>
    </div>
    
      <ul class="nav nav-pills mb-3 justify-content-md-center" id="pills-tab" role="tablist">
        <!--li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Musikdi</a>
        </li>-->
        <li class="nav-item sp-1">
          <a class="nav-link active nav-link-color" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Spotify</a>
        </li>
        <li class="nav-item yt-1">
          <a class="nav-link nav-link-color" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">YouTube</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <!-- div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>-->
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php include "gapi/profileTrackSP.php";?>

        </div>
        <div class="tab-pane fade text-center" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
            <p class = "ppbold mb-2"> YouTube info:  </p>
            <div class = "row mx-auto justify-content-md-center align-items-center">
            
            
            <?php 
                echo $response["yt_embed"];
            ?>
            
            </div> 
        </div>
      </div>
    
    

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
