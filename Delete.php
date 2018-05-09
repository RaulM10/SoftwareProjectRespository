<?php
    session_start();
    include "connect.php";
    $Username = $_SESSION["Username"];
    $Id = $_GET["DelId"];
    $ChosenAccount = $ChosenOrder = "";
    $GetAllUsernameQuery = "SELECT * FROM account";
    $GetAllUsernameResult = mysqli_query($link, $GetAllUsernameQuery);
    while($AllUsernames = mysqli_fetch_assoc($GetAllUsernameResult)){
        if(password_verify($Username, $AllUsernames["Username"])){
            $ChosenAccount = $AllUsernames["Account_Id"];
        }
    }
    $GetOrderIdQuery = "SELECT Order_Id FROM order_table WHERE Account_Id = $ChosenAccount";
    $GetOrderIdResult = mysqli_query($link, $GetOrderIdQuery);
    while($GetOrderId = mysqli_fetch_assoc($GetOrderIdResult)){
        $ChosenOrder = $GetOrderId["Order_Id"];
    }
    $DeleteQuery = "DELETE FROM order_product WHERE Order_Id = $ChosenOrder AND Product_Id = $ChosenAccount";
    $DeleteQueryResult = mysqli_query($link, $DeleteQuery);
    if(mysqli_affected_rows($link) == 1){
        header("Location: MyCart.php");
    }
    else{}
?>