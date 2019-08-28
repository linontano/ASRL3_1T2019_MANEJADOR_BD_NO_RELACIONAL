<?php

    include "gapi/authYT.php"; //devuelve el servicio YouTube $service
    $yt_id = $response["yt_id"];
    
    $queryParams = [
        'id' => $yt_id
    ];

    $response = $service->channels->listChannels('brandingSettings, snippet, statistics', $queryParams);
    $show = $response->items; //array
    if (isset($show)){
        $banner=$show[0]["brandingSettings"]["image"]["bannerImageUrl"];
        $nameChannel = $show[0]["snippet"]["title"];
        $descripcion = $show[0]["snippet"]["description"];
        $profileimg = $show[0]["snippet"]["thumbnails"]->default->url;
        $scb = $show[0]["statistics"]->subscriberCount;
        
        /*print_r("<pre>");
        print_r($response->items);
        print_r("</pre>");*/
?>
<div class="container">
    <div class = "row justify-content-md-center">
        <div class="col-10">
            <img src="<?php echo $banner;?>" class="img-fluid">
        </div>
        
    </div>
    <div class = "row mt-4 justify-content-md-center  align-items-center">
        <div class="col-md-2">
            <img src="<?php echo $profileimg;?>" class="img-thumbnail rounded-circle">
        </div> 
        <div class="col-md-4">
            <p><h3><?php echo $nameChannel; ?></h3> (<?php echo $scb ?> suscriptores) </p>
            <p><?php if($descripion!=" "){echo $descripcion;}else{echo "No hay descripción disponible.";}; ?> </p>

        </div>
    </div>
    <div class="row mt-4 justify-content-md-center  align-items-center">
        <a type="button" href="http://www.youtube.com/channel/<?php echo $yt_id ?>" class="btn btn-outline-danger">Ir al canal de YouTube</a>
    </div>

</div><!-- fin container-->



<?php
    }
    /*else{
        foreach ($response['items'] as $rs){
            $yt_id = $rs["id"]["channelId"];
            
        }*/
?>    
