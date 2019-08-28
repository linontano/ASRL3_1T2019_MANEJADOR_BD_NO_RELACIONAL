
    <?php 

        $id = new MongoDB\BSON\ObjectId($_id);
        switch($kind) {
            case "artist":
                $artistas = new MongoDB\Collection($manager,'test','artistas'); //devuelve una Collection
                $conf = $artistas->find(['_id' => $id ])->toArray();
                if($srcimg != $conf["imgurl"]){
                    $artistas->updateOne(['_id' => $id],['$set' => ['imgurl' => $srcimg]]);
                    $artistas->updateOne(['_id' => $id],['$set' => ['spotify_id' => $id_sp]]);
                    //actualiza info del Artista
                }
                if($yt_id != $conf["yt_id"]){
                    $artistas->updateOne(['_id' => $id],['$set' => ['yt_id' => $yt_id]]);
                }
                break;
            case "track":
                $tracks = new MongoDB\Collection($manager,'test','canciones'); //devuelve una Collection

                $conf = $tracks->find(['_id' => $id])->toArray();
                if($srcimg != $conf["imgurl"]){
                    $tracks->updateOne(['_id' => $id],['$set' => ['imgurl' => $srcimg]]);
                    //actualiza info del track
                }
                if($yt_embed != $conf["yt_embed"]){
                    $tracks->updateOne(['_id' => $id],['$set' => ['yt_embed' => $yt_embed]]);
                }
                if(!isset($conf["sp_info"])){
                    $tracks->updateOne(['_id' => $id],['$set' => ['sp_info' => $sptrack_info]]);
                }
                break;
            case "album":
                $albums = new MongoDB\Collection($manager,'test','albumes'); //devuelve una Collection

                $conf = $albums->find(['_id' => $id])->toArray();
                if($srcimg != $conf["imgurl"]){
                    $albums->updateOne(['_id' => $id],['$set' => ['imgurl' => $srcimg]]);
                    //actualiza info del album
                }
                if(isset($spalb_info) and !isset($conf["spalb_info"])){
                    $albums->updateOne(['_id' => $id],['$set' => ['spalb_info' => $spalb_info]]);
                    //actualiza info del album

                }
                
                
                break;
            default:
                exit();

        }

        

    ?>
