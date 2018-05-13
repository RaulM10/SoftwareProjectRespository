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
        if($Rating == 0 || $Rating == ""){
            echo "<style>
                    #WebsiteFeedbackRating{
                        border: 1px solid #ff0000;
                    }
                </style>";
        }
        else{
            echo "<style>
                    #WebsiteFeedbackRating{
                        border: 1px solid #00ff00;
                    }
                </style>";
                $RatingBool = true;
        }
        if(strlen($Comments) == 0 || $Comments == ""){
            echo "<style>
                    #WebsiteFeedbackTextArea{
                        border: 1px solid #ff0000;
                    }
                </style>";
                
        }
        else{
            echo "<style>
                    #WebsiteFeedbackTextArea{
                        border: 1px solid #00ff00;
                    }
                </style>";
                $CommentsBool = true;
        }
        if($RatingBool && $CommentsBool){
            $Comments = trim($Comments, " \t.");
            $InsertQuery = "INSERT INTO website_review(Rating, Review) VALUES('$Rating', '$Comments')";
            $InsertResult  = mysqli_query($link, $InsertQuery) or die (mysqli_error($link));
            
        }
    
    }

    if(isset($_POST["ProductFeedbackBtn"])){
        $RatingBool = $CommentsBool = $ProductBool = false;
        $Rating = $_POST["ProductFeedbackRating"];
        $Comments = $_POST["ProductFeedbackTextArea"];
        $ProductChosen = $_POST["ProductValues"];
        if($Rating == 0 || $Rating == ""){
            echo "<style>
                    #ProductFeedbackRating{
                        border: 1px solid #ff0000;
                    }
                </style>";
        }
        else{
            echo "<style>
                    #ProductFeedbackRating{
                        border: 1px solid #00ff00;
                    }
                </style>";
                $RatingBool = true;
        }
        if(strlen($Comments) == 0 || $Comments == ""){
            echo "<style>
                    #ProductFeedbackTextArea{
                        border: 1px solid #ff0000;
                    }
                </style>";
                
        }
        else{
            echo "<style>
                    #ProductFeedbackTextArea{
                        border: 1px solid #00ff00;
                    }
                </style>";
                $CommentsBool = true;
        }
        if($ProductChosen == 0){
            echo "<style>
                    #ProductValues{
                        border: 1px solid #ff0000;
                    }
                </style>";    
        }
        else{
            echo "<style>
                    #ProductValues{
                        border: 1px solid #00ff00;
                    }
                </style>";
            $ProductBool = true;
        }
        if($RatingBool && $CommentsBool && $ProductBool){
            $Comments = trim($Comments, " \t.");
            $InsertQuery = "INSERT INTO product_review(Rating, Review, Product_Id) VALUES('$Rating', '$Comments', '$ProductChosen')";
            $InsertResult  = mysqli_query($link, $InsertQuery) or die (mysqli_error($link));
        }
    }






?>





<form id = "WebsiteFeedbackDiv" method = "post" action = "Feedback.php" autocomplete = "off">
    <h1> - - Website Feedback - - </h1>
    <?php
        echo "<input type = 'text' name = 'WebsiteFeedbackFullName' id = 'WebsiteFeedbackFullName' placeholder = '$Username' class = 'form-control' disabled>
        <br/>
        <input type = 'email' id = 'WebsiteFeedbackEmail' placeholder = '$EmailAddress' class = 'form-control' name = 'WebsiteFeedbackEmail' disabled>";
    ?>
    <label for = "WebsiteFeedbackRating"> Rating: </label>
    <input type = "number" id = "WebsiteFeedbackRating" name = "WebsiteFeedbackRating" min = "1" max = "5">
    <br/>
    <label for = "WebsiteFeedbackTextArea"> Comments: </label>
    <textarea name = "WebsiteFeedbackTextArea" id = "WebsiteFeedbackTextArea" rows =  "15" cols = "75"></textarea>
    <input type = "submit" value = "Submit" id = "WebsiteFeedbackSubmitBtn" class = "btn btn-outline-light" name = "WebsiteFeedbackBtn">
</form>
<p id = "TopLines">  | | | | | | | |</p>
<p id = "OrWord"> OR </p>
<p id = "BottomLines">  | | | | | | | |</p>
<form id = "ProductFeedbackDiv" method = "post" action = "Feedback.php" autocomplete = "off">
    <h1> - - Product Feedback - - </h1>
    <?php
        echo "<input type = 'text' name = 'ProductFeedbackFullName' id = 'ProductFeedbackFullName' placeholder = '$Username' class = 'form-control' disabled>
        <br/>
        <input type = 'email' id = 'ProductFeedbckEmail' placeholder = '$EmailAddress' class = 'form-control' name = 'ProductFeedbackEmail' disabled>";
    ?>
    <br/>
    <label for = "ProductFeedbackRating"> Rating: </label>
    <input type = "number" id = "ProductFeedbackRating" name = "ProductFeedbackRating" min = "1" max = "5">
    <br/>
    <label for = "ProductFeedbackTextArea"> Comments: </label>
    <textarea name = "ProductFeedbackTextArea" id = "ProductFeedbackTextArea" rows =  "15" cols = "75"></textarea>
    <?php
    $Team = $Cloth = $Kit = "";
        include "connect.php";
        echo "<select name = 'ProductValues' id = 'ProductValues'>
              <option value = 0>- - Select a Product - -</option>";
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
    <input type = "submit" value = "Submit" id = "ProductFeedbackBtn" class = "btn btn-outline-light" name = "ProductFeedbackBtn">
</form>