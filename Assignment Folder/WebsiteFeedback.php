<?php
    session_start();
    include "header.php";
    include "connect.php";
    $GetAllReviews = "SELECT * FROM website_review";
    $GetAllReviewsResult = mysqli_query($link, $GetAllReviews);
    while($Reviews = mysqli_fetch_assoc($GetAllReviewsResult)){
        echo "<div id = 'Review'>
                <div id = 'Rating'>
                    <label for = 'RatingNum'> Rating: </label>";
                    switch($Reviews["Rating"]){
                        case 1:  echo "<span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>"; 
                                      break;
                        case 2:  echo "<span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>"; 
                                      break;
                        case 3:  echo "<span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>"; 
                                      break;
                        case 4:  echo "<span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'far fa-star fa-2x'></span>"; 
                                      break;
                        case 5:  echo "<span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>
                                       <span class = 'fas fa-star fa-2x'></span>"; 
                                      break;
                    }
                    echo "</div>
                            <div id = 'Comments'>
                                <label for = 'CommentsText'> Comments: </label>
                                <span id = 'CommentsText'>'". $Reviews["Review"] ."'</span>
                            </div>
                        </div>";
                    
    }
    

?>
<a href = "Feedback.php"> Feedback Page </a>
<a href = "ProductFeedback.php"> Product </a>