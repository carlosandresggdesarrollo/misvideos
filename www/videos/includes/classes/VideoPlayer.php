<?php

    class VideoPlayer{

        private $video;

        public function __construct($video){
            $this->video = $video;
        }

        public function create($autoPlay){
            if($autoPlay){
                $autoPlay = "autoplay";
            }
            else{
                $autoPlay = "";
            }
            $filePath = $this->video->getFilePath();
            return "
            <br><br><br><br><br>
            <video class='videoPlayer' controls $autoPlay>
                <source src='$filePath' type='video/mp4'>
                Su navegador no soporta la etiqueta de vídeo.
            </video>";
        }
    }

?>