<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "header.php";
        include "connect.php";
        $ChosenAccount = $ChosenOrder = "";
        $Username = $_SESSION["Username"];
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
        $GetAllProducts = "SELECT * FROM order_product WHERE Order_Id = $ChosenOrder";
        $GetAllProductsResult = mysqli_query($link, $GetAllProducts);
        while($AllProducts = mysqli_fetch_assoc($GetAllProductsResult)){
            $ActualSize  = $ActualPrice = "";
            $SizeName = $AllProducts["Size_Id"];
            $Query = "SELECT * FROM size WHERE Size_Id = $SizeName";
            $GetSizeName = mysqli_query($link, $Query);
            while($Size = mysqli_fetch_assoc($GetSizeName)){
                $ActualSize = $Size["Name"];
            }
            echo "<div id = 'Product'>";
            $PriceVar = $AllProducts["Product_Id"];
            $PriceQuery = "SELECT * FROM product WHERE Product_Id = $PriceVar";
            $PriceResult = mysqli_query($link, $PriceQuery);
            while($Price = mysqli_fetch_assoc($PriceResult)){
                $ActualPrice = $Price["Price"];
                echo "<img src = '". $Price["URL"] ."' alt = 'My Cart Image' id = 'Image'>";
            }
                    echo $AllProducts["Product_Id"];
                    echo "<span>Quantity: ". $AllProducts["Quantity"] ."</span><br/>
                    <span>Size: $ActualSize </span></br>
                    <span>Price: &euro;". $ActualPrice * $AllProducts["Quantity"] ."</span></br>
                    <button class = 'btn btn-warning'><a href = 'Edit.php?Id=". $AllProducts['Product_Id'] ."'> Update </a></button><br/>
                    <button class = 'btn btn-danger'><a href = 'Delete.php?DelId=". $AllProducts["Product_Id"] ."'> Delete </a></button><br/>
                </div>";   
        }
        
        
        
        
        
        
        
        
        echo "<link rel = 'stylesheet' href = 'CSS/MyCart.css'>
        <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>
    </body>
</html>";
    }
    else{
        header("Location: index.php");
    }
?>