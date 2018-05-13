<?php
    session_start();
    include "header.php";
    include "connect.php";
    $GetAllReviews = "SELECT * FROM website_review";
    $GetAllReviewsResult = myslqi_query();





?>