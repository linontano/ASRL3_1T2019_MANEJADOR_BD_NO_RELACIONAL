<?php
//parametro name externo
include "gapi/authYT.php";
//definido el $service
$foundYT=true;

try{
    switch($kind) {
        case "artist":
            $stype = 'channel';
            break;
        case "track":
            $stype = 'video';
            break;
        default:
            exit();
    }

    $queryParams = [
        'maxResults' => 1,
        #'order' => 'relevance',
        'q' => strtolower($name),
        'type' => $stype
        
    ];

    $response = $service->search->listSearch('snippet', $queryParams);
    if (!isset($response)){
        $foundYT=false;
    }
    else{
        foreach ($response['items'] as $rs){
            if($kind=="track"){ //solo video o channel
                $video_id = $rs['id']['videoId'];
                if(isset($video_id)){
                    $queryParams2 = [
                        'id' => $video_id
                    ];
                    //obtengo reproductor embebido de la busqueda
                    $response2 = $service->videos->listVideos('player', $queryParams2);
                    foreach($response2["items"] as $rs2){
                        $yt_embed = $rs2["player"]->embedHtml;
                        //echo $yt_embed;
                    }
                }
                else{
                    $response2 = null;
                    $foundYT = false;
                    
                }
            }
            else{ //channel
                $yt_id = $rs["id"]["channelId"];
            }
        }
    }
}
catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
}
catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
}
?>