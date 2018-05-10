<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "header.php";
        include "connect.php";
        echo "<h1> Products Details </h1>";
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
            $PriceVar = $AllProducts["Product_Id"];
            $PriceQuery = "SELECT * FROM product WHERE Product_Id = $PriceVar";
            $PriceResult = mysqli_query($link, $PriceQuery);
            while($Price = mysqli_fetch_assoc($PriceResult)){
                $ActualPrice = $Price["Price"];
                echo "<img src = '". $Price["URL"] ."' alt = 'My Cart Image' id = 'Image'>";
            }
                    echo "<div id = 'table'>
                            <table class = 'table'>
                                <thead class = 'thead-light'>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Price </th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <th>". $AllProducts["Quantity"] ."</th>
                                        <th> $ActualSize </th>
                                        <th>&euro;". $ActualPrice * $AllProducts["Quantity"] ."</th>
                                        <th><button class = 'btn btn-warning'><a href = 'Edit.php?Id=". $AllProducts['Product_Id'] ."'> Update </a></button></th>
                                        <th><button class = 'btn btn-danger'><a href = 'Delete.php?Id=". $AllProducts["Product_Id"] ."'> Delete </a></button></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class = 'clear'></div>";   
        }
        $GetAllOrderProducts = "SELECT * FROM order_product WHERE Order_Id = $ChosenOrder";
        $GetAllOrders = mysqli_query($link, $GetAllOrderProducts);
        if(mysqli_affected_rows($link) >= 1){
            echo "<button class= 'btn btn-primary btn-lg btn-block'> Proceed To Checkout  </button>";
        }
        else{}
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