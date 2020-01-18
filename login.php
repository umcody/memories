<?php
    if(isset($_POST["submitButton"])){
        $firstname = $_POST["firstname"];
        $firstname = $_POST["firstname"];  
        $firstname = $_POST["firstname"];
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
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
                    <h3>Sign In</h3>
                    <span>to continue to our Memories</span>

                </div>
                <form method = "POST">

                    <input type = "text"name = "username" placeholder = "Username" required>

                    <input type = "password"name = "password" placeholder = "Password" required>

                    <input type = "submit"name = "submitButton" value = "SUBMIT">

                </form>

                <a href="register.php" class = "signInMessage"> Don't have an Account? Sign Up Here </a>
            </div>
        </div>
        <link rel= "stylesheet" type = "text/css" href = "assets/style/style.css"> 
    </body>

</html>