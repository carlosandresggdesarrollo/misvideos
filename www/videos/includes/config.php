<?php

    ob_start();
    session_start();

    date_default_timezone_set("Asia/Kolkata");

    try {
       # $con = new PDO("mysql:dbname=videotube;host=localhost", "andres", "cagg199324");
        $con = new PDO("mysql:dbname=video;host=db", "andres", "Kb.204.2022");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>