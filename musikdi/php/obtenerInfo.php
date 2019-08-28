<?php
    include "php/db.inc.php"; //$manager
    
    switch($kind) {
        case "artist":
            $artistas = new MongoDB\Collection($manager,'test','artistas'); //devuelve una Collection
            $response = $artistas->findOne(['_id' => $_id]);//->toArray();
            //update countSearch
            $busq = $response["Busquedas"];
            $artistas->updateOne(['_id' => $_id],['$set' => ['Busquedas' => $busq+1]]);
            
            break;
        case "track":
            $tracks = new MongoDB\Collection($manager,'test','canciones'); //devuelve una Collection
            $response = $tracks->findOne(['_id' => $_id]);

            $artistas = new MongoDB\Collection($manager,'test','artistas'); //devuelve una Collection
            $albums = new MongoDB\Collection($manager,'test','albumes'); //devuelve una Collection
            
            $_id = new MongoDB\BSON\ObjectId($response["_album"]);
            $ralbum = $albums->findOne(['_id' => $_id]);

            foreach($response["_artista"] as $art){
                $_id = new MongoDB\BSON\ObjectId($art);
                $artist = $artistas->findOne(['_id' => $_id ]);//->toArray();
                $rartistas[] = array($artist);
            }

            $sp_info = $response["sp_info"];
            
            break;
        case "album":
            $albums = new MongoDB\Collection($manager,'test','albumes'); //devuelve una Collection

            $response = $albums->findOne(['_id' => $_id]);
            $sp_info = $response["spalb_info"];
            
            break;
        default:
            $response = null;
            exit();

        }


?>