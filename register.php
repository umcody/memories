<?php
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/constants.php");
require_once("includes/classes/Account.php");
require_once("includes/config.php");
$account = new Account($con);

    if(isset($_POST["submitButton"])){
        $firstname = FormSanitizer::sanitizeFormString($_POST["firstname"]);
        $lastname = FormSanitizer::sanitizeFormString($_POST["lastname"]); 
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $account->register($firstname,$lastname,$username,$email,$email2,$password,$password2);
    }


?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class = "signInContainer">
            <div class = "column ">
                <div class = "header">
                    <img src = "assets/images/logo.png" title = "Memories" alt = "Site Logo" class = "logo"/>
                    <h3>Sign Up</h3>
                    <span>to continue to our Memories</span>

                </div>
                <form method = "POST">

                    <input type = "text"name = "firstname" placeholder = "First Name" required>
                    <?php echo $account->getError(Constants::$firstNameCharacters);?>

                    <input type = "text"name = "lastname" placeholder = "Last Name" required>
                    <?php echo $account->getError(Constants::$lastNameCharacters);?>

                    <input type = "text"name = "username" placeholder = "Username" required>
                    <?php echo $account->getError(Constants::$userNameCharacters);?>

                    <input type = "email"name = "email" placeholder = "E-mail" required>
                    <?php echo $account->getError(Constants::$emailCharacters);  
                        echo $account->getError(Constants::$emailTaken);  ?>

                    <input type = "email"name = "email2" placeholder = "Confirm E-mail" required>
                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>

                    <input type = "password"name = "password" placeholder = "Password" required>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>

                    <input type = "password"name = "password2" placeholder = "Confirm Password" required>
                    <?php echo $account->getError(Constants::$validatePasswords); ?>

                    <input type = "submit"name = "submitButton" value = "SUBMIT">

                </form>

                <a href="login.php" class = "signInMessage"> Already have an Account? Sign in Here </a>
            </div>
        </div>
        <link rel= "stylesheet" type = "text/css" href = "assets/style/style.css"> 
    </body>

</html>