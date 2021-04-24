<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0 ;
if($_user_id){
    header("Location: words.php");
}


include_once('functionHead.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tasks</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    
    
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container" id="main">
        <h1 class="maintitle">
            <img src="dictionary.png" alt="" > My Vocabularies
        </h1>
        <div class="row navigation">
            <div class="column column-60 column-offset-20">
                <div class="formaction">
                    <a href="#" id="login" class="reglog">Login</a> |  <a class="reglog" href="#" id="register">Register Account</a>
                </div><br>
                <div class="formc">
                    <form action="task.php" id="form01" method="POST">
                        <h3>Login</h3>
                        <fieldset>
                        <label for="email"> Email</label>
                        <input type="text" placeholder="Email Address" id="email" name="email">
                        <label for="password"> Password</label>
                        <input type="text" placeholder="Password" id="password" name="password">
                            <p>
                            <?php 
                            $status = $_GET['status'] ?? 0;
                            if($status){
                                echo getStatusMassage($status);
                            }
                            ?>
                            </p>
                        <input type="submit" class="button-Primary" value="Submit">
                        <input type="hidden" name="action" value="login" id="action">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script>
    ;(function($){
        $(document).ready(function(){
            // alert("HELLO");
            $('#login').on('click', function(){
                $("#form01 h3").html("Login");
                $("#action").val("login");
            });

            $('#register').on('click', function(){
                $("#form01 h3").html("Register");
                $("#action").val("register");
            });

        });
    })(jQuery);

</script>
</body>
</html>







