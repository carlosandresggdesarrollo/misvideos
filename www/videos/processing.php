<?php
    require_once("includes/header.php");
    require_once("includes/classes/VideoUploadData.php");
    require_once("includes/classes/VideoProcessor.php");

    echo $_POST['opt'];
    if(isset($_POST['opt']))
    {
        if($_POST['opt'] == 'fileinitial')
        {
            if(!isset($_POST['uploadButton']))
            {
                echo "Ningún archivo enviado a la página -- ".$_POST['fileInput']." -- ";
                exit();
            }else{
                 // 1) Create File Upload Data
                $videoUploadData = new VideoUploadData(
                    $_FILES["fileInput"],
                    $_POST["titleInput"],
                    $_POST["descriptionInput"],
                    $_POST["privacyInput"],
                    $_POST["categoryInput"],
                    $userLoggedInObj->getUsername() 
                );

                // 2) Process Video data (Upload)

                $videoProcessor = new VideoProcessor($con);
                $wasSuccessful = $videoProcessor->upload($videoUploadData);

                // 3) Check if Upload was Successful

                if($wasSuccessful){
                    echo "Upload Successful!";
                }else {
                    echo "Falla";
                }
            }   
           
        }else{
            echo "No hay archivos 2";
        }
    }else {
        echo "no hay Datos 1".$_POST['opt'];
    }
?>