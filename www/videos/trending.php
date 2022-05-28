<?php

require_once("includes/header.php");
require_once("includes/classes/TrendingProvider.php");

$trendingProvider = new TrendingProvider($con, $userLoggedInObj);
$videos = $trendingProvider->getVideos();

$videoGrid = new VideoGrid($con, $userLoggedInObj);

?>

<div class='largeVideoGridContainer'>

    <?php
    if(sizeof($videos) > 0){
        echo $videoGrid->createLarge($videos, "Vídeos de tendencia subidos la semana pasada", false);
    }
    else {
        echo "No hay videos de tendencias para mostrar";
    }
    ?>

</div>