<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "connect.php";
        include "header.php";
        $ChosenAccount = $ChosenOrder = $ChosenTownId = $ChosenTown = $ChosenCountryId = $ChosenCountry = "";
        $TotalPrice = $TotalCountProducts = 0;
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
                                    </tr>
                                </thead>
                                    <tr>
                                        <td>". $AllProducts["Quantity"] ."</td>
                                        <td> $ActualSize </td>
                                        <td>&euro;". $ActualPrice * $AllProducts["Quantity"] ."</td>
                                    </tr>
                            </table>
                        </div>
                        <div class = 'clear'></div>";
    }
    echo "<div id = 'FinalStepInformation'>";
            $GetAllProducts = "SELECT * FROM order_product WHERE Order_Id = $ChosenOrder";
            $GetAllProductsResult = mysqli_query($link, $GetAllProducts);
            while($AllProducts = mysqli_fetch_assoc($GetAllProductsResult)){
                $TotalCountProducts = mysqli_num_rows($GetAllProductsResult);
                $TotalPrice += $AllProducts["Price"];
            }
            echo "<p>You Ordered a total of $TotalCountProducts Products and the Total Price is &euro;$TotalPrice </p>";
            $GetTownId = "SELECT Town_Id FROM user WHERE Account_Id = $ChosenAccount";
            $GetTownIdResult = mysqli_query($link, $GetTownId);
            while($TownId = mysqli_fetch_assoc($GetTownIdResult)){
                $ChosenTownId = $TownId["Town_Id"];
            }
            $GetTown = "SELECT * FROM town WHERE Town_Id = $ChosenTownId";
            $GetTownResult = mysqli_query($link, $GetTown);
            while($Town = mysqli_fetch_assoc($GetTownResult)){
                $ChosenTown = $Town["Name"];
            }
            $GetCountryId = "SELECT Country_Id FROM town WHERE Town_Id = $ChosenTownId";
            $GetCountryIdResult = mysqli_query($link, $GetCountryId);
            while($CountryId = mysqli_fetch_assoc($GetCountryIdResult)){
                $ChosenCountryId = $CountryId["Country_Id"];
            }
            $GetCountry = "SELECT * FROM country WHERE Country_Id = $ChosenCountryId";
            $GetCountryResult = mysqli_query($link, $GetCountry);
            while($Country = mysqli_fetch_assoc($GetCountryResult)){
                $ChosenCountry = $Country["Name"];
            }
            echo "<p> Select type of Payment </p>
                  <div class='custom-control custom-radio'>
                      <input type='radio' id='PayPal' name='PayPal' class='custom-control-input'>
                      <label class='custom-control-label' for='customRadio1'>Toggle this custom radio</label>
                    </div>
                    <div class='custom-control custom-radio'>
                      <input type='radio' id='VISA' name='VISA' class='custom-control-input'>
                      <label class='custom-control-label' for='customRadio1'>Toggle this custom radio</label>
                    </div>
                    <div class='custom-control custom-radio'>
                      <input type='radio' id='Bitcoin' name='Bitcoin' class='custom-control-input'>
                      <label class='custom-control-label' for='customRadio1'>Toggle this custom radio</label>
                    </div>
                  <label for = 'DeliveryLocation'> Delivery Location: </label>
                  <input type = 'text' id = 'DeliveryLocation' placeholder = '$ChosenTown, $ChosenCountry' disabled><br/>
                  <p> Your Products will be delivered between 7 to 14 working days.
                  </div>
                <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>";

    
    }






?>