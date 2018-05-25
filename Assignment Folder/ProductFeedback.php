<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "header.php";
        include "connect.php";
        echo "<div id = 'MainContent'>";
        $GetAllReviews = "SELECT * FROM product_review";
        $GetAllReviewsResult = mysqli_query($link, $GetAllReviews);
        while($Reviews = mysqli_fetch_assoc($GetAllReviewsResult)){
            echo "<aside id =  'LeftSide'>
                    <p> Click <a href = 'Feedback.php'> here </a> to go to the Feedback Page </p>
                  </aside> 
                   <div id = 'Review'>
                    <div id = 'ChosenProductImage'>";
                    $GetImage = "SELECT * FROM product WHERE Product_Id = '". $Reviews["Product_Id"] ."'";
                    $GetImageResult = mysqli_query($link, $GetImage);
                    while($Image = mysqli_fetch_assoc($GetImageResult)){
                        echo "<img src = '". $Image["URL"] ."' id = 'Image'>";
                    }
                    echo "</div>
                        <div id = 'ReviewProperties'>
                        <label for = 'RatingNum'> Rating: </label>";
                        switch($Reviews["Rating"]){
                            case 1:  echo "<span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span><br/>"; 
                                          break;
                            case 2:  echo "<span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span><br/>"; 
                                          break;
                            case 3:  echo "<span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span><br/>"; 
                                          break;
                            case 4:  echo "<span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'far fa-star fa-2x'></span><br/>"; 
                                          break;
                            case 5:  echo "<span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span>
                                           <span class = 'fas fa-star fa-2x'></span><br/>"; 
                                          break;
                        }
                        echo "<label for = 'CommentsText'> Comments: </label>
                              <span id = 'CommentsText'>'". $Reviews["Review"] ."'</span>
                              </div>
                            </div>
                            <aside id =  'RightSide'>
                                <p> Click <a href = 'WebsiteFeedback.php'> here </a> to go to the Website Review Page </p>
                            </aside> 
                            <div class = 'clear'></div>";
                }

            echo "</div>";
    }
    else{
        header("Location: index.php");
    }

?>
        <link rel = 'stylesheet' href = 'CSS/ProductFeedback.css'>
        <!--<script src = 'Scripts/Menu.js'></script>-->
        <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>
    </body>
</html>