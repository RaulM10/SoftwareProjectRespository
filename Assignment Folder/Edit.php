<?php
    session_start();
    if(isset($_SESSION["Username"])){
        echo "<!DOCTYPE html>
                <html lang = 'en'>
                    <head>
                        <title> Football Sportswear </title>
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
                    </head>
                    <body>
                        <h1> Product Update </h1>"; 
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
        $GetProduct = "SELECT * FROM order_product WHERE Order_Id = $ChosenOrder AND Product_Id = $Id";
        $GetProductResult = mysqli_query($link, $GetProduct);
        while($Product = mysqli_fetch_assoc($GetProductResult)){
            echo "<form action = 'Edit.php?Id=$Id' method = 'post' id = 'EditForm'>";
            $ProductQuery = "SELECT * FROM product WHERE Product_Id = $Id";
            $ProductResult = mysqli_query($link, $ProductQuery);
            while($ProductGotten = mysqli_fetch_assoc($ProductResult)){
                echo "<img src = '". $ProductGotten["URL"] ."' alt = 'Updated Image' id = 'Image'>";
            }
                echo "<table class = 'table'>
                        <thead class = 'thead-light'>
                            <tr>
                                <th> Quantity </th>
                                <th> Size </th>
                                <th> Update Product </th>
                                <th> Cancel Update </th>
                            </tr>
                        </thead>
                            <tr>
                                <td><input type = 'number' name = 'UpdateQuantity'></td>
                                <td><select name = 'UpdateSelect'>
                                        <option value = '0' selected> Select Size </option>
                                        <option value = '1'> Extra Small </option>
                                        <option value = '2'> Small </option>
                                        <option value = '3'> Medium </option>
                                        <option value = '4'> Large </option>
                                        <option value = '5'> Extra Large </option>
                                        <option value = '6'> Extra Extra Large </option>
                                      </select>
                                </td>
                                <td><input type = 'submit' value = 'Add to My Cart' class = 'btn btn-warning' name = 'UpdateButton'></td>
                                <td><input type = 'submit' value = 'Discard Changes' class = 'btn btn-danger' name = 'GoBack'></td>
                            </tr>
                        </table>
                    </form>
                    <img src = 'https://www.bvb.de/var/ezdemo_site/storage/images/media/bilder/galeriebilder/signal-iduna-park2/930061-1-ger-DE/Signal-Iduna-Park_bvbinfobild_regular.jpg' alt = 'Signal Iduna Park' id = 'BackgroundImage'>
                    <link type = 'text/css' rel = 'stylesheet' href='CSS/Edit.css'>
                    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
                    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>
                </body>
            <html>";
        }
    }
    if(isset($_POST["UpdateButton"])){
        $SizeBool = $QuantityBool = false;
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
            $GetProduct = "SELECT * FROM product WHERE Product_Id  = $Id";
            $GetProductResult = mysqli_query($link, $GetProduct);
            while($Product = mysqli_fetch_assoc($GetProductResult)){
                $TotalPrice = $Product["Price"] * $Quantity;
                $UpdateQuery = "UPDATE order_product SET Quantity = $Quantity, Size_Id = $Size, Price = $TotalPrice WHERE Order_Id = $ChosenOrder AND Product_Id = $Id";
                $QueryResult = mysqli_query($link, $UpdateQuery);
                if(mysqli_affected_rows($link) == 1){
                    header("Location: MyCart.php");
                }
                else{

                }
            }
                
            }
        }
    
    if(isset($_POST["GoBack"])){
        header("Location: MyCart.php");
    }
        
?>