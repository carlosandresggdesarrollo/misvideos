<?php

class NavigationMenuProvider{

    private $con, $userLoggedInObj;

    public function __construct($con, $userLoggedInObj){
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create(){
        $menuHtml = $this->createNavItem("Inicio", "assets/images/icons/home.png", "index.php");
        $menuHtml .= $this->createNavItem("Tendencias", "assets/images/icons/trending.png", "trending.php");
        $menuHtml .= $this->createNavItem("Suscripciones", "assets/images/icons/subscriptions.png", "subscriptions.php");
        $menuHtml .= $this->createNavItem("Vídeos que me han gustado", "assets/images/icons/thumb-up.png", "likedVideos.php");

        if(User::isLoggedIn()){
            $menuHtml .= $this->createNavItem("Ajustes", "assets/images/icons/settings.png", "settings.php");
            $menuHtml .= $this->createNavItem("Cerrar sesión", "assets/images/icons/logout.png", "logout.php");
            
            $menuHtml .= $this->createSubscriptionSection();
        }

        return "<div class='navigationItems'>
                    $menuHtml
                </div>";

    }

    private function createNavItem($text, $icon, $link){
        return "<div class='navigationItem'>
                    <a href='$link'>
                        <img src='$icon'>
                        <span>$text</span>
                    </a>
                </div>";
    }

    private function createSubscriptionSection(){
        $subscriptions = $this->userLoggedInObj->getSubscriptions();

        $html = "<span class='heading'>Subscriptions</span>";
        foreach($subscriptions as $sub){
            $subUsername = $sub->getUsername();
            $html .= $this->createNavItem($subUsername, $sub->getProfilePic(), "profile.php?username=$subUsername");
        }
        return $html;
    }

}

?>