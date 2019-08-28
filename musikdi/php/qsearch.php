<?php 
if (isset($search)){
    include "db.inc.php"; //devuelve $manager

    $artistas = new MongoDB\Collection($manager,'test','artistas'); //devuelve una Collection
    $albumes = new MongoDB\Collection($manager,'test','albumes'); //devuelve una Collection
    $canciones = new MongoDB\Collection($manager,'test','canciones'); //devuelve una Collection
    $kind = null;
    $regex = new \MongoDB\BSON\Regex(preg_quote($search), 'i');
    $rart = $artistas->find(['Nombre' => $regex]);
    
    


    if ($artistas->countDocuments(['Nombre' => $regex])>0){
        $arart = $rart->toArray();  
        
        
?>
    <div class="col md-4" >
        <h2 class="ppbold">Artistas</h2>
        
        <?php
        foreach($arart as $art){
            $name = $art["Nombre"];
            $_id = $art["_id"];
            $kind = "artist";
            include "gapi/infoArtistSP.php";
            include "gapi/infoArtistYT.php";
            if($foundSP or $foundYT){
                include "php/updateItem.php";
            }
        ?>  
            <div class="card" style="width: 10rem;">
                <a href="profileArtist.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>"><img src="<?php echo $srcimg;?>" class="card-img-top rounded-lg"  alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><a href="profileArtist.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>">
                    <?php echo $art["Nombre"]; ?>
                    </a></h5>
                        
                </div>
            </div>
        
        <?php    
                       
        }
        ?>
        
        
    </div>
<?php
    }
    $ralb = $albumes->find(['Nombre' => $regex]);
    if ($albumes->countDocuments(['Nombre' => $regex])>0){
        $aralb = $ralb->toArray();
?>
    <div class="col md-4" >
        <h2 class="ppbold">Albumes</h2>
        
        <?php
        foreach($aralb as $alb){
            $kind = "album";
            $_id = $alb["_id"];
            $name = $alb["Nombre"];
            
            include "gapi/infoAlbumSP.php";
            if($foundSP or $foundYT){
                include "php/updateItem.php";
            }
            ?>  
            <div class="card" style="width: 10rem;">
                <a href="profileAlbum.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>"><img src="<?php echo $srcimg;?>" class="card-img-top rounded-lg"  alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><a href="profileAlbum.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>">
                    <?php echo $alb["Nombre"]; ?>
                    </a></h5>
                        
                </div>
            </div>
        
        <?php    
        
        }
        ?>
        
        
    </div>

<?php   
    }
    $rcan = $canciones->find(['Nombre' => $regex]);
    if ($canciones->countDocuments(['Nombre' => $regex])>0){
        $arcan = $rcan->toArray();
?>
    <div class="col md-4" >
        <h2 class="ppbold">Canciones</h2>
        
        <?php
        foreach($arcan as $can){
            $kind = "track";
            $_id = $can["_id"];
            $name = $can["Nombre"];
            include "gapi/infoSongsSP.php";
            include "gapi/infoArtistYT.php";
            if($foundSP or $foundYT){
                include "php/updateItem.php";
            }
            ?>  
            <div class="card" style="width: 10rem;">
                <a href="profileTrack.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>"><img src="<?php echo $srcimg;?>" class="card-img-top rounded-lg"  alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><a href="profileTrack.php?id=<?php echo $_id;?>&kind=<?php echo $kind;?>">
                    <?php echo $can["Nombre"]; ?>
                    </a></h5>
                        
                </div>
            </div>
        
        <?php    
        
        }
        ?>
        </p>
        
    </div>

<?php
    }
}
?>



