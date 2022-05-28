<?php require_once("includes/header.php"); ?>


<div class="containeer">
    <?php

        $subscriptionsProvider = new SubscriptionsProvider($con, $userLoggedInObj);
        $subscriptionVideos = $subscriptionsProvider->getVideos();
    
        $videoGrid = new VideoGrid($con, $userLoggedInObj->getUsername());

        if(User::isLoggedIn() && sizeof($subscriptionVideos) > 0){
            echo $videoGrid->create($subscriptionVideos, "Suscripciones", false);
        }

        echo $videoGrid->create(null, "Recomendado", false);

    ?>
</div>

                
<?php require_once("includes/footer.php") ?>