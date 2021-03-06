<?php
    require_once("includes/config.php");
    require_once("includes/classes/Account.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/FormSanitizer.php");

    $account = new Account($con);
    
    if(isset($_POST["submitButton"])){
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $wasSuccessful = $account->login($username, $password);

        if($wasSuccessful){
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Videos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

    <div class="signInContainer bg-dark">
        <div class="column">
            <div class="header">
                <img src="assets/images/icons/VideoTubeLogo.png" title="logo" alt="Site logo">
                <h3>Registrarse</h3>
                <span>Continua</span>
            </div>

            <div class="loginForm">
                <form action="signIn.php" method="POST">
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <input type="text" class="form-control" name="username" placeholder="Usuario" value="<?php getInputValue('username'); ?>" required autocomplete="off">
                    <input type="password" class="form-control" name="password" placeholder="Contrase??a" required>
                    <input type="submit" name="submitButton" class="btn btn-primary" value="Entrar">
                </form>
            </div>

            <a class="signInMessage" href="signUp.php"> ??Necesitas una cuenta? Registrate aqu??.</a>

        </div>
    </div>

</body>
</html>