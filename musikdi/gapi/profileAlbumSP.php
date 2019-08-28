<?php
    echo '<div class="col mt-4"> '; //abro columna
    $bd = $albums->findOne(['_id' => $_id]);
    $alb_info = $bd["spalb_info"];
    if (isset($alb_info)){ //cabecera
?> 
        <h3 class="ppbold">Álbum info</h3>
        <p><b>Nombre:</b> &nbsp
        <a href="<?php echo $alb_info['alb_ref'];?>"> <?php echo $alb_info['alb_name'];?> </a></p>

        <p> <b>Fecha de lanzamiento:</b>  &nbsp  <?php echo $alb_info['alb_release'];?> </p>
        

<?php    

        if(isset($alb_info["alb_tracks"])){
            $tracks = $alb_info["alb_tracks"];
            //si existe la info en la base, pinto directamente el contenido de la base
            echo '<h3 class="ppbold mt-4">Tracklist</h3>';
            foreach($tracks as $tr) {
                echo '<p>'.$tr["track_num"].' &nbsp &nbsp <a href="'.$tr["track_url"].'">'.$tr["track_name"].'</a></p>';    

            }
            echo '<a href="'.url_track.'" class="btn btn-success mt-4">Ir al álbum</a>';
            echo'</div>';//cierro columna
        }    
        else{
            //sino consulto la api de spotify
            include "authSP.php";

            $api = new SpotifyWebAPI\SpotifyWebAPI();
            $api->setAccessToken($accessToken);
            $consulta=$api->getAlbumTracks($sp_info["alb_id"],[]);

        /*print_r('<pre>');
        print_r($result);
        print_r('</pre>');*/

        // It's now possible to request data from the Spotify catalog

            if (!isset($consulta)){ //si no responde, mando mensje de error
    ?>        
            
            <p>No existe información para mostrar <img class = "mr-5" width="16px" src="fonts/fontawesome-free/svgs/solid/tired.svg"></p>
            </div>
    <?php
            }
            else{ //obtengo los datos de spotify y los almaceno en base
                
                
                echo '<h3 class="ppbold mt-4">Tracklist</h3>';
                foreach ($consulta->items as $track){
                    $ntrack = $track->track_number;
                    $name_track =  $track->name;
                    $url_track =  $track->external_urls->spotify;
                    $sp_tracks[] = array("track_num" => $ntrack, "track_name" => $name_track, "track_url" =>$url_track);
                    echo '<p>'.$ntrack.' &nbsp &nbsp <a href="'.$url_track.'">'.$name_track.'</a></p>';
                }
                echo '<a href="'.url_track.'" class="btn btn-success mt-4">Ir al álbum</a>';

                echo'</div>';
                $alb_info["alb_tracks"] = $sp_tracks; //actualizo el arreglo y lo inserto
                $albums->updateOne(['_id' => $_id],['$set' => ['spalb_info' => $alb_info]]);
            }
        }
    }
    else{
?>
        <p>No existe información para mostrar <img class = "mr-5" width="16px" src="fonts/fontawesome-free/svgs/solid/tired.svg"></p>
    </div>

<?php    
    }
?>