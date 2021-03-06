<?php
    require_once("includes/header.php");
    require_once("includes/classes/VideoDetailsFormProvider.php");
?>


<div class="column">
    
    <?php
        $formProvider = new VideoDetailsFormProvider($con);
        echo $formProvider->createUploadForm();
    ?>

</div>

<script>
    $("form").submit(function(){
        $("#loadingModal").modal("show");
    });
</script>


<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
         Espere hasta que se complete el procesamiento del video.
        <img src="assets/images/icons/loading-spinner.gif" alt="loading_image">
      </div>
    </div>
  </div>
</div>

                
<?php require_once("includes/footer.php") ?>