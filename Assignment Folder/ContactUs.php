<?php
    session_start();
    $EmailAddress = "";
    if(isset($_POST["SendEmailBtn"])){
        $Receiver = $EmailAddress;
        $Message = $_POST["Message"];
        
    }








    if(isset($_SESSION["Username"])){
        include "connect.php";
        include "header.php";
        echo "<form action = 'ContactUs.php' method = 'post' id = 'ContactUsForm'>
                <div class = 'col'>
                    <label for = 'Receiver'>Email Address </label>";
                    $AccountEmail = "";
                    $Username = $_SESSION["Username"];
                    $GetAccountId = "SELECT * FROM account";
                    $GetAccountIdResult = mysqli_query($link, $GetAccountId);
                    while($Account = mysqli_fetch_assoc($GetAccountIdResult)){
                        if(password_verify($Username, $Account["Username"])){
                            $AccountEmail =  $Account["Account_Id"];
                        }
                    }
                    $GetEmail = "SELECT * FROM user WHERE Account_Id = $AccountEmail";
                    $GetEmailResult = mysqli_query($link, $GetEmail);
                    while($Email = mysqli_fetch_assoc($GetEmailResult)){
                        $EmailAddress = $Email["Email_Address"];
                        echo "<input type = 'email' id = 'Receiver' name = 'Receiver' placeholder = '$EmailAddress' disabled
                        >";
                    }
                echo "</div>
                <div class = 'col'>
                    <label for = 'Message'>Enter the Message</label>
                    <textarea id = 'Message' name = 'Message' rows = '15' cols = '50'></textarea>
                </div>
                <div class = 'col'>
                    <button class = 'btn btn-primary' name = 'SendEmailBtn'> Send Email </button>
                </div>
            </form> 
        <link rel = 'stylesheet' href = 'CSS/ContactUs.css'>
        <!--<script src = 'Scripts/Menu.js'></script>-->
        <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>";
        
    }
        
?>