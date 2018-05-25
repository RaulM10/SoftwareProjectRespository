<?php
    session_start();
    if(isset($_GET["Bought"])){
        echo "<div class = 'alert alert-success' role = 'alert' id = 'WebsiteAlert'>
                   Products were Succesfully Bought! They will be dlevered between 7 to 14 days.
                   Thank you for shopping at Football Sportwear System!
            </div>";    
    }
    else{}
    if(isset($_SESSION["Username"])){
        $ChosenAccount = $ChosenOrder = $ChosenTownId = $ChosenTown = $ChosenCountryId = $ChosenCountry = "";
        $TotalPrice = $TotalCountProducts = 0;
        include "connect.php";
        include "header.php";
        echo "<div id = 'MainContent'>";
        $Username = $_SESSION["Username"];
        $GetAllUsernameQuery = "SELECT * FROM account";
        $GetAllUsernameResult = mysqli_query($link, $GetAllUsernameQuery);
        while($AllUsernames = mysqli_fetch_assoc($GetAllUsernameResult)){
            if(password_verify($Username, $AllUsernames["Username"])){
                $ChosenAccount = $AllUsernames["Account_Id"];
            }
        }
        $GetTownId = "SELECT * FROM user WHERE Account_Id = '$ChosenAccount'";
        $GetTown = mysqli_query($link, $GetTownId) or die (mysqli_error($link));
        while($Town = mysqli_fetch_assoc($GetTown)){
            $ChosenTownId = $Town["Town_Id"];
        }
        $GetTownName = "SELECT * FROM town WHERE Town_Id = '$ChosenTownId'";
        $TownName = mysqli_query($link, $GetTownName);
        while($Name = mysqli_fetch_assoc($TownName)){
            $ChosenTown = $Name["Name"];
            $ChosenCountryId = $Name["Country_Id"];
            
        }
        $GetCountry = "SELECT * FROM country WHERE Country_Id * '$ChosenCountryId'";
        $GetCName = mysqli_query($link, $GetCountry);
        while($c = mysqli_fetch_assoc($GetCName)){
            $ChosenCountry = $c["Name"];
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
                echo "<aside id = 'LeftSide'></aside>
                        <div id = 'ProductDivs'>
                        <img src = '". $Price["URL"] ."' alt = 'My Cart Image' id = 'Image'>";
            }
                    echo "<div id = 'ProductTextInfo'>
                            <h1> Product Information </h1>
                              <p> Quantity: ". $AllProducts["Quantity"] ."<p>
                              <p> Size: $ActualSize </p>
                              <p>Price: &euro;". $ActualPrice * $AllProducts["Quantity"] ."</p>
                            </div>
                        </div>
                          <aside id = 'RightSide'></aside>
                        <div class = 'clear'></div>";
    }
    echo "</div>";
    echo "<div id = 'ProductsSeparator'></div>
            <div id = 'FinalStepInformation'>
            <p> Select type of Payment </p>
                      <input type='radio' id='PayPal' name='Payment'>
                      <label class='custom-control-label' for='PayPal'><img src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbouB_0hW27JIHoGkD5Y4Wlti8uhZNGYCuArAr2p1mOpOrktRj' alt = 'VISA Card'  id = 'PaymentImages'></label>
                      <input type='radio' id='VISA' name='Payment'>
                      <label class='custom-control-label' for='customRadio1'><img src = 'https://www.accralately.com/wp-content/uploads/2016/06/PayPalCard.png' alt = 'Paypal Card'  id = 'PaymentImages'></label>
                      <input type='radio' id='Bitcoin' name='Payment'>
                      <label class='custom-control-label' for='Bitcoin'><img src = 'https://cdn.shopify.com/s/files/1/2340/4875/products/bitcoin-on-home_603x.png?v=1508234703' alt = 'Bitcoin'  id = 'PaymentImages'></label>
                  <br/>
                  <label for = 'DeliveryLocation'> Delivery Location: </label>
                  <input type = 'text' id = 'DeliveryLocation' placeholder = '$ChosenTown, $ChosenCountry' disabled><br/>
                <a href = 'BuyProducts.php?OrderId=". $ChosenOrder. "'><input type = 'submit' value = 'Buy' class = 'btn btn-primary' name = 'BuyBtn' id = 'BuyBtn'></a>
            </div>
                <link href = 'CSS/CheckoutPage.css' rel = 'stylesheet'>
                <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>";

    
    
        
    
    }
    else{
        header("Location: index.php");
    }
    
    





?>