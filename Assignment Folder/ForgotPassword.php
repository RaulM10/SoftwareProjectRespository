<?php
    if(isset($_POST["FrgtPassButton"])){
        $UserFrgtPassEmail = $_POST["FrgtPassEmail"];
        $UserFrgtPassPass = $_POST["FrgtPassPass"];
        $UserFrgtPassPass2 = $_POST["FrgtPassPass2"];
        settype($UserFrgtPassEmail, "string");
        if(empty($UserFrgtPassEmail)){
            echo "<style type = 'text/css'>
                    #email{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $emailBool = false;
            echo "<style type = 'text/css'>
                    #email{
                        border: 1px #00ff00 solid;
                    }
                  </style>";

        }
        
        if(empty($UserFrgtPassPass)){
            echo "<style type = 'text/css'>
                    #FrgtPassPass{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $emailBool = false;
            echo "<style type = 'text/css'>
                    #FrgtPassPass{
                        border: 1px #00ff00 solid;
                    }
                  </style>";

        }
        
        if(empty($UserFrgtPassPass2)){
            echo "<style type = 'text/css'>
                    #FrgtPassPass2{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $emailBool = false;
            echo "<style type = 'text/css'>
                    #FrgtPassPass2{
                        border: 1px #00ff00 solid;
                    }
                  </style>";
        }
        if(strcmp($UserFrgtPassPass, $UserFrgtPassPass2)){
                echo "<style type = 'text/css'>
                    #RptPassword{
                        border: 1px #ff0000 solid;
                    }
                    #RegPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
        else{
            include "connect.php";
            $GetEmailAccount = "SELECT Account_Id FROM user WHERE Email_Address = '$UserFrgtPassEmail'";
            $GetAccountId = mysqli_query($link, $GetEmailAccount);
            if(mysqli_num_rows($GetAccountId) > 0){
                while($GetAccountRow = mysqli_fetch_assoc($GetAccountId)){
                    $SelectedAccountId = $GetAccountRow["Account_Id"];
                    $HashedPassword = password_hash($UserFrgtPassPass, PASSWORD_DEFAULT);
                    $ChangePasswordQuery = "UPDATE account SET Password = '$HashedPassword' WHERE Account_Id = '$SelectedAccountId'";
                    $ChangePasswordQuery = mysqli_query($link, $ChangePasswordQuery);
                    header("Location: index.php");
                }
            }
            else{
                echo "<style type = 'text/css'>
                    #email{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
        }  
    }
    if(isset($_POST["BackButton"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Football Sportswear </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/eb9905f6ff.js"></script>
    </head>
    <body>
        <div class = "container">
            <form action = "ForgotPassword.php" method = "post" id = "FrgtPassForm" autocomplete = "off">
                <h1 id = "Title">- - Update Password - -</h1>
                <label for =  "email">Email Address: </label>
                <input type = "email" id = "email" class = "form-control" name = "FrgtPassEmail"><br/>
                <label for = "FrgtPassPass">Enter New Password: </label>
                <input type = "password" id = "FrgtPassPass" class = "form-control" name = "FrgtPassPass"><br/>
                <label for = "FrgtPassPass2"> Confirm New Password: </label>
                <input type = "password" id = "FrgtPassPass2" class = "form-control" name = "FrgtPassPass2"><br/>
                <div class = "row">
                    <div class = "col">
                        <input type = "submit" value = "Back" name = "BackButton" id = "BackButton" class = "btn btn-primary">
                    </div>
                    <div class = "col">
                        <input type = "submit" value = "Update Password" name = "FrgtPassButton" id = "FrgtPassButton" class = "btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <img src = "https://i0.wp.com/www.barcelonacard.org/wp-content/uploads/2014/04/camp-nou.jpg?fit=750%2C350&ssl=1" alt = "Camp Nou" id = "BackgroundImage">
        <link type = "text/css" rel = "stylesheet" href="CSS/ForgotPassword.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZ
    </body>
    
</html>