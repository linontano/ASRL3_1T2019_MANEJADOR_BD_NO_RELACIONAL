<?php
    include "authSP.php";
    $foundSP=true;
    $srcimg = "...";
    // Fetch the saved access token from somewhere. A database for example.

    
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $api->setAccessToken($accessToken);
    $result=$api->search($name,'track',['limit'=> '1']);
/*    print_r('<pre>');
    print_r($result);
    print_r('</pre>');*/
    // It's now possible to request data from the Spotify catalog

    if (!isset($result)){
        $foundSP=false;
    }
    else{
        foreach ($result->tracks->items as $tr){
            $array =  $tr->album->images;
            $srcimg = $array[0]->url;
            
            $sptrack_name = $tr->name;
            $sptrack_href = $tr->external_urls->spotify;
            $sptrack_prev = $tr->preview_url;
            $sptrack_albm = $tr->album->name;
            foreach($tr->artists as $art){
                $sptrack_arts[] = array("spart_id" => $art->external_urls->spotify, "spart_name" => $art->name );
            }
            $sptrack_info = array( "name"=> $sptrack_name,
                                   "track_id" => $sptrack_href,
                                   "preview" => $sptrack_prev,
                                   "name_album" => $sptrack_albm,
                                   "artists" => $sptrack_arts, 
                                    "img" => $srcimg );
        }
    }
?>