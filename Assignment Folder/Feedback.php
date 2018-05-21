<?php
    session_start();
    include "connect.php";
    include "header.php";
    $AccountEmail = $EmailAddress = $FullName = "";
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
    }    
    
    if(isset($_POST["WebsiteFeedbackBtn"])){
        $RatingBool = $CommentsBool = false;
        $Rating = $_POST["WebsiteFeedbackRating"];
        $Comments = $_POST["WebsiteFeedbackTextArea"];
        if($Rating == 0 || $Rating == ""){}
        else{
            $RatingBool = true;
        }
        if(strlen($Comments) == 0 || $Comments == ""){}
        else{
            $CommentsBool = true;
        }
        
        if(!$RatingBool && !$CommentsBool){
            echo "<div class = 'alert alert-danger' role = 'alert' id = 'WebsiteAlert'>
                    There are missing data in the fields. All fields must not be empty!
                  </div>";
        }
        
        if($RatingBool && $CommentsBool){
            $Comments = trim($Comments, " \t.");
            $InsertQuery = "INSERT INTO website_review(Rating, Review) VALUES('$Rating', '$Comments')";
            $InsertResult  = mysqli_query($link, $InsertQuery) or die (mysqli_error($link));
            echo "<div class = 'alert alert-success' role = 'alert' id = 'WebsiteAlert'>
                    Review Saved. Thank you for your co-operation!
                  </div>"; 
            
        }
    
    }

    if(isset($_POST["ProductFeedbackBtn"])){
        $RatingBool = $CommentsBool = $ProductBool = false;
        $Rating = $_POST["ProductFeedbackRating"];
        $Comments = $_POST["ProductFeedbackTextArea"];
        $ProductChosen = $_POST["ProductValues"];
        if($Rating == 0 || $Rating == ""){
            echo "<div class = 'alert alert-danger' role = 'alert' id = 'ProductAlert'>
                    There are missing data in the fields. All fields must not be empty!
                  </div>";
        }
        else{
            $RatingBool = true;
        }
        if(strlen($Comments) == 0 || $Comments == ""){
           echo "<div class = 'alert alert-danger' role = 'alert' id = 'ProductAlert'>
                    There are missing data in the fields. All fields must not be empty!
                  </div>";
                
        }
        else{
            $CommentsBool = true;
        }
        if($ProductChosen == 0){
            echo "<div class = 'alert alert-danger' role = 'alert' id = 'ProductAlert'>
                    There are missing data in the fields. All fields must not be empty!
                  </div>";
        }
        else{
            $ProductBool = true;
        }
        if($RatingBool && $CommentsBool && $ProductBool){
            $Comments = trim($Comments, " \t.");
            $InsertQuery = "INSERT INTO product_review(Rating, Review, Product_Id) VALUES('$Rating', '$Comments', '$ProductChosen')";
            $InsertResult  = mysqli_query($link, $InsertQuery) or die (mysqli_error($link));
            if(mysqli_affected_rows($link) > 0){
                echo "<div class = 'alert alert-success' role = 'alert' id = 'ProductAlert'>
                        Review Saved. Thank you for your co-operation!
                      </div>";
            }
        }
    }
?>


        <form id = "WebsiteFeedbackDiv" method = "post" action = "Feedback.php" autocomplete = "off">
            <h1> - - Website Feedback - - </h1>
            <div class = "form-group">
                <label for = "WebsiteFeedbackFullName"> Username: </label>
                <?php
                    echo "<input type = 'text' name = 'WebsiteFeedbackFullName' id = 'WebsiteFeedbackFullName' placeholder = '$Username' class = 'form-control' disabled>
                    <br/>
                   <label for = 'WebsiteFeedbackEmail'> Email Address: </label>
                    <input type = 'email' id = 'WebsiteFeedbackEmail' placeholder = '$EmailAddress' class = 'form-control' name = 'WebsiteFeedbackEmail' disabled>";
                ?>
                <label for = "WebsiteFeedbackRating"> Rating: </label>
                <input type = "number" id = "WebsiteFeedbackRating" name = "WebsiteFeedbackRating" min = "1" max = "5" class = "form-control">
                <br/>
                <label for = "WebsiteFeedbackTextArea"> Comments: </label>
                <textarea class = "form-control" name = "WebsiteFeedbackTextArea" id = "WebsiteFeedbackTextArea" rows =  "15" cols = "75"></textarea>
                <input type = "submit" value = "Submit" id = "WebsiteFeedbackSubmitBtn" class = "btn btn-outline-light" name = "WebsiteFeedbackBtn">
                <p> Click <a href = "WebsiteFeedback.php"> here </a> to see all the Rewiews about the Website. </p> 
            </div>
        </form>
        <p id = "TopLines">  | | | | | | | |</p>
        <p id = "OrWord"> OR </p>
        <p id = "BottomLines">  | | | | | | | |</p>
        <form id = "ProductFeedbackDiv" method = "post" action = "Feedback.php" autocomplete = "off">
            <h1> - - Product Feedback - - </h1>
            <label for = "ProductFeedbackFullName"> Username: </label>
            <?php
                echo "<input type = 'text' name = 'ProductFeedbackFullName' id = 'ProductFeedbackFullName' placeholder = '$Username' class = 'form-control' disabled>
                <br/>
                <label for = 'ProductFeedbckEmail'> Email Address: </label>
                <input type = 'email' id = 'ProductFeedbckEmail' placeholder = '$EmailAddress' class = 'form-control' name = 'ProductFeedbackEmail' disabled>";
            ?>
            <br/>
            <label for = "ProductFeedbackRating"> Rating: </label>
            <input class = "form-control" type = "number" id = "ProductFeedbackRating" name = "ProductFeedbackRating" min = "1" max = "5">
            <br/>
            <label for = "ProductFeedbackTextArea"> Comments: </label>
            <textarea  class = "form-control" name = "ProductFeedbackTextArea" id = "ProductFeedbackTextArea" rows =  "15" cols = "75"></textarea>
            <?php
            $Team = $Cloth = $Kit = "";
                include "connect.php";
                echo "<label for = ProductValues> Select a Product: </label>
                      <select name = 'ProductValues' id = 'ProductValues' class = 'form-control'>
                      <option value = 0>- - Product - -</option>";
                $GetAllProducts = "SELECT * FROM product";
                $GetAllProductsResult = mysqli_query($link, $GetAllProducts);
                while($Product = mysqli_fetch_assoc($GetAllProductsResult)){
                    $TeamId = $Product["Team_Id"];
                    $GetTeam = "SELECT * FROM team WHERE Team_Id = '$TeamId'";
                    $GetTeamResult = mysqli_query($link, $GetTeam) or die (mysqli_error($link));
                    while($TeamProd = mysqli_fetch_assoc($GetTeamResult)){
                        $Team =  $TeamProd["Name"];
                    }
                    $ClothId = $Product["Cloth_Id"];
                    $GetCloth = "SELECT * FROM cloth WHERE Cloth_Id = '$ClothId'";
                    $GetClothResult = mysqli_query($link, $GetCloth) or die (mysqli_error($link));
                    while($ClothProd = mysqli_fetch_assoc($GetClothResult)){
                        $Cloth =  $ClothProd["Type"];
                    }
                    $KitId = $Product["Kit_Id"];
                    $GetKit = "SELECT * FROM kit WHERE Kit_Id = '$KitId'";
                    $GetKitResult = mysqli_query($link, $GetKit) or die (mysqli_error($link));
                    while($KitProd = mysqli_fetch_assoc($GetKitResult)){
                        $Kit = $KitProd["Type"];
                        echo $Kit;
                    }
                    echo "<option value = '". $Product["Product_Id"] ."'> $Team  $Kit $Cloth </option>";

                }
                    echo "</select>";


            ?>
            <input type = "submit" value = "Submit" id = "ProductFeedbackBtn" class = "btn btn-outline-light" name = "ProductFeedbackBtn"><br/>
            <p> Click <a href = "ProductFeedback.php" id="Producta"> here </a> to see all the Rewiews about the Products. </p> 
        
        </form>
        <img src = "http://www.nydailynews.com/resizer/XErINUWIVRZIEv1T0JxDbylFh68=/1400x0/arc-anglerfish-arc2-prod-tronc.s3.amazonaws.com/public/CNCRHBZAFTM75SSUHZ4UT4QFAM.jpg" alt = "Azteca Stadium" id = "BackgroundImage">
        <link type = "text/css" rel = "stylesheet" href="CSS/Feedback.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>

