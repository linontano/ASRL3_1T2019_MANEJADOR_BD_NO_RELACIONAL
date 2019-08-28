<?php
    include "authSP.php";
    $foundSP=true;
    $srcimg = "...";
    // Fetch the saved access token from somewhere. A database for example.

    
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $api->setAccessToken($accessToken);
    $result=$api->search($name,'album',['limit'=> '1']);
    /*print_r('<pre>');
    print_r($result);
    print_r('</pre>');*/

    // It's now possible to request data from the Spotify catalog

    if (!isset($result)){
        $foundSP=false;
    }
    else{
        foreach ($result->albums->items as $ar){
            $array =  $ar->images;
            $srcimg = $array[1]->url;
            $spal_id = $ar->id;
            $spal_href = $ar->external_urls->spotify;
            $spal_name = $ar->name;
            $spal_date = $ar->release_date;
            $spalb_info = array("alb_id" => $spal_id, "alb_name" => $spal_name, "alb_release" => $spal_date, "alb_ref" => $spal_href);
            
        }
    }
    
?>