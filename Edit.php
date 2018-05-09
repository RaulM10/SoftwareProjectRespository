<?php
    session_start();
    include "connect.php";
    $Id = $_GET["Id"];
    $Username = $_SESSION["Username"];
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
    echo $ChosenOrder ."   ". $Id;
    $GetProduct = "SELECT * FROM order_product WHERE Order_Id = $ChosenOrder AND Product_Id = $Id";
    $GetProductResult = mysqli_query($link, $GetProduct);
    while($Product = mysqli_fetch_assoc($GetProductResult)){
        echo "<form action = 'Edit.php?Id=$Id' method = 'post'>
                <div id = 'Product'>";
        $ProductQuery = "SELECT * FROM product WHERE Product_Id = $Id";
        $ProductResult = mysqli_query($link, $ProductQuery);
        while($ProductGotten = mysqli_fetch_assoc($ProductResult)){
            echo "<img src = '". $ProductGotten["URL"] ."' alt = 'Updated Image' id = 'image'>";
        }
        echo "<label for = 'quantity'> Quantity: </label>
              <input type = 'number' name = 'UpdateQuantity'><br/>
              <select name = 'UpdateSelect'>
                <option value = '0' selected> Select Size </option>
                <option value = '1'> Extra Small </option>
                <option value = '2'> Small </option>
                <option value = '3'> Medium </option>
                <option value = '4'> Large </option>
                <option value = '5'> Extra Large </option>
                <option value = '6'> Extra Extra Large </option>
              </select>
            <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-warning' name = 'UpdateButton'>
            </form>";
    }
    if(isset($_POST["UpdateButton"])){
        $Size = $_POST["UpdateSelect"];
        $Quantity = $_POST["UpdateQuantity"];
        
        if($Size == 0){}
        else{
            $SizeBool = true;
        }
        if($Quantity <= 0){}
        else{
            $QuantityBool = true;
        }
        if($SizeBool && $QuantityBool){
            
            $UpdateQuery = "UPDATE order_product SET Quantity = $Quantity, Size_Id = $Size, Price =  WHERE Order_Id = $ChosenOrder AND Product_Id = $Id";
            $QueryResult = mysqli_query($link, $UpdateQuery);
            if(mysqli_affected_rows($link) == 1){
                header("Location: MyCart.php");
            }
            else{
                
            }
        }
    }
    
?>