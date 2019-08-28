<?php
    include "authSP.php";
    $foundSP=true;
    $srcimg = "...";
    // Fetch the saved access token from somewhere. A database for example.

    
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $api->setAccessToken($accessToken);
    $result=$api->search($name,'artist',['limit'=> '1']);
    
    // It's now possible to request data from the Spotify catalog

    if (!isset($result)){
        $foundSP=false;
    }
    else{
        foreach ($result->artists->items as $ar){
            $array =  $ar->images;
            $srcimg = $array[2]->url;
            $id_sp = $ar->id;
            
        }
    }
?>