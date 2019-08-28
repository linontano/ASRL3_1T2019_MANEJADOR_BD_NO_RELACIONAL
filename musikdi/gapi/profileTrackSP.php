<?php
    if(isset($sp_info)) {
    ?>
    <div class="container text-center">
        <div class = "col">
            <p class = "ppbold mb-2"> Spotify info:  </p>
            <img width="15%"class = "rounded-circle mb-2" src="<?php echo $sp_info["img"];?>" alt=""><br>
            <a class = "ppbold fs-25"href="<?php echo $sp_info["track_id"];?>"><?php echo $sp_info["name"];?></a>
            <p class = "fs-18"><?php echo $sp_info["name_album"];?></p>
<?php 
    $str_sp="";
    
    foreach($sp_info["artists"] as $arts){
        $str_sp = $str_sp.", <a href='".$arts["spart_id"]."'>".$arts["spart_name"]."</a>";
    }
    echo substr($str_sp,1);    
?>
            
        </div>    
    </div>
<?php
}
else{
?>
    <div class = "col text-center mx-auto">
        <p>No existe información para mostrar <img class = "mr-5" width="16px" src="fonts/fontawesome-free/svgs/solid/tired.svg"></p>
        
    </div>
<?php
}
    
?>