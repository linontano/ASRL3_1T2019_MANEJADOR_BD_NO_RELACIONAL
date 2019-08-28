<?php
    include "gapi/authSP.php";
//    include "php/db.inc.php";//se incluye en el principal profileArtist.php
    // Fetch the saved access token from somewhere. A database for example.
 /*   $artistas = new MongoDB\Collection($manager,'test','artistas'); //devuelve una Collection
    $response = $artistas->findOne(['_id' => $_id]);//->toArray();*/
    
    $spotify_id = $response["spotify_id"];

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $api->setAccessToken($accessToken);
    $resultSP=$api->getArtist($spotify_id);  
    ?>
    <div class = 'row justify-content-md-center'>
        <div class='col-6'>
            <p>
            <b>Total seguidores: </b><br><?php echo $resultSP->followers->total;?> seguidores<br>
            <b>Popularidad: </b>
            </p> 
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $resultSP->popularity;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $resultSP->popularity;?>%</div>
            </div>
        
        </div>
        
    </div>
    <div class="row mt-4 justify-content-md-center  align-items-center">
         <a type="button" href="<?php echo $resultSP->external_urls->spotify; ?>"class="btn btn-outline-success">Ir al perfil de Spotify</a>
    </div>
    
    <?php
    
?>