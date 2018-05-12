<?php
    session_start();
    include "connect.php";
    include "LocationButtons.php";
    function AddToMyCart($Product_Id, $Size_Id, $Quantity, $Price){
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
        $TotalPrice = $Quantity * $Price;
        $InsertQuery = "INSERT INTO order_product(Order_Id, Product_Id, Size_Id, Quantity, Price) VALUES('$ChosenOrder', '$Product_Id', '$Size_Id', '$Quantity', '$TotalPrice')";
        $InsertResult = mysqli_query($link, $InsertQuery);
    }

    function ValidateToAddToMyCart($SelectName, $QuantityName, $ProductId){
        include "connect.php";
        $Price = "";
        $SizeBool = $QuantityBool = false;
        $Size = $_POST["$SelectName"];
        $Quantity = $_POST["$QuantityName"];
        
        if($Size == 0){}
        else{
            $SizeBool = true;
        }
        if($Quantity <= 0){}
        else{
            $QuantityBool = true;
        }
        if($SizeBool && $QuantityBool){
            $GetPriceQuery = "SELECT Price FROM product WHERE Product_Id = $ProductId";
            $GetPriceResult = mysqli_query($link, $GetPriceQuery);
            while($GetPrice = mysqli_fetch_assoc($GetPriceResult)){
                $Price = $GetPrice["Price"];
            }
            AddToMyCart($ProductId, $Size, $Quantity, $Price);
        }
    }

    if(isset($_POST["JuveHomeShirt"])){
        $SelectName = "JuveHomeShirtSelect";
        $QuantityName = "JuveHomeShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 1);
    }

    

    if(isset($_POST["JuveHomeShorts"])){
        $SelectName = "JuveHomeShortsSelect";
        $QuantityName = "JuveHomeShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 2);
    }

    if(isset($_POST["JuveHomeSocks"])){
        $SelectName = "JuveHomeSocksSelect";
        $QuantityName = "JuveHomeSocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 3);
    }

    if(isset($_POST["JuveAwayShirt"])){
        $SelectName = "JuveAwayShirtSelect";
        $QuantityName = "JuveAwayShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 4);
    }

    if(isset($_POST["JuveAwayShorts"])){
        $SelectName = "JuveAwayShortsSelect";
        $QuantityName = "JuveAwayShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 5);
    }

    if(isset($_POST["JuveAwaySocks"])){
        $SelectName = "JuveAwaySocksSelect";
        $QuantityName = "JuveAwaySocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 6);
    }

    if(isset($_POST["Juve3Shirt"])){
        $SelectName = "Juve3ShirtSelect";
        $QuantityName = "Juve3ShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 7);
    }

    if(isset($_POST["Juve3Shorts"])){
        $SelectName = "Juve3ShortsSelect";
        $QuantityName = "Juve3ShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 8);
    }

    if(isset($_POST["Juve3Socks"])){
        $SelectName = "Juve3SocksSelect";
        $QuantityName = "Juve3SocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 9);
    }

    if(isset($_POST["BayernHomeShirt"])){
        $SelectName = "BayernHomeShirtSelect";
        $QuantityName = "BayernHomeShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 10);
    }

    if(isset($_POST["BayernHomeShorts"])){
        $SelectName = "BayernHomeShortsSelect";
        $QuantityName = "BayernHomeShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 11);
    }

    if(isset($_POST["BayernHomeSocks"])){
        $SelectName = "BayernHomeSocksSelect";
        $QuantityName = "BayernHomeSocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 12);
    }

    if(isset($_POST["BayernAwayShirt"])){
        $SelectName = "BayernAwayShirtSelect";
        $QuantityName = "BayernAwayShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 13);
    }

    if(isset($_POST["BayernAwayShorts"])){
        $SelectName = "BayernAwayShortsSelect";
        $QuantityName = "BayernAwayShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 14);
    }

    if(isset($_POST["BayernAwaySocks"])){
        $SelectName = "BayernAwaySocksSelect";
        $QuantityName = "BayernAwaySocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 15);
    }

    if(isset($_POST["Bayern3Shirt"])){
        $SelectName = "Bayern3ShirtSelect";
        $QuantityName = "Bayern3ShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 16);
    }

    if(isset($_POST["Bayern3Shorts"])){
        $SelectName = "Bayern3ShortsSelect";
        $QuantityName = "Bayern3ShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 17);
    }

    if(isset($_POST["Bayern3Socks"])){
        $SelectName = "Bayern3SocksSelect";
        $QuantityName = "Bayern3SocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 18);
    }

    if(isset($_POST["PSGHomeShirt"])){
        $SelectName = "PSGHomeShirtSelect";
        $QuantityName = "PSGHomeShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 19);
    }

    if(isset($_POST["PSGHomeShorts"])){
        $SelectName = "PSGHomeShortsSelect";
        $QuantityName = "PSGHomeShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 20);    
    }

    if(isset($_POST["PSGHomeSocks"])){
        $SelectName = "PSGHomeSocksSelect";
        $QuantityName = "PSGHomeSocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 21);
    }

    if(isset($_POST["PSGAwayShirt"])){
        $SelectName = "PSGAwayShirtSelect";
        $QuantityName = "PSGAwayShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 22);
    }

    if(isset($_POST["PSGAwayShorts"])){
        $SelectName = "PSGAwayShortsSelect";
        $QuantityName = "PSGAwayShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 23);
    }

    if(isset($_POST["PSGAwaySocks"])){
        $SelectName = "PSGAwaySocksSelect";
        $QuantityName = "PSGAwaySocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 24);
    }

    if(isset($_POST["PSG3Shirt"])){
        $SelectName = "PSG3ShirtSelect";
        $QuantityName = "PSG3ShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 25);
    }

    if(isset($_POST["PSG3Shorts"])){
        $SelectName = "PSG3ShortsSelect";
        $QuantityName = "PSG3ShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 26);
    }

    if(isset($_POST["PSG3Socks"])){
        $SelectName = "PSG3SocksSelect";
        $QuantityName = "PSG3SocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 27);
    }

    if(isset($_POST["ManCHomeShirt"])){
        $SelectName = "ManCHomeShirtSelect";
        $QuantityName = "ManCHomeShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 28);
    }

    if(isset($_POST["ManCHomeShorts"])){
        $SelectName = "ManCHomeShortsSelect";
        $QuantityName = "ManCHomeShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 29);
    }

    if(isset($_POST["ManCHomeSocks"])){
        $SelectName = "ManCHomeSocksSelect";
        $QuantityName = "ManCHomeSocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 30);
    }

    if(isset($_POST["ManCAwayShirt"])){
        $SelectName = "ManCAwayShirtSelect";
        $QuantityName = "ManCAwayShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 31);
    }

    if(isset($_POST["ManCAwayShorts"])){
        $SelectName = "ManCAwayShortsSelect";
        $QuantityName = "ManCAwayShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 32);
    }

    if(isset($_POST["ManCAwaySocks"])){
        $SelectName = "ManCAwaySocksSelect";
        $QuantityName = "ManCAwaySocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 33);
    }

    if(isset($_POST["ManC3Shirt"])){
        $SelectName = "ManC3ShirtSelect";
        $QuantityName = "ManC3ShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 34);
    }

    if(isset($_POST["ManC3Shorts"])){
        $SelectName = "ManC3ShortsSelect";
        $QuantityName = "ManC3ShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 35);
    }

    if(isset($_POST["ManC3Socks"])){
        $SelectName = "ManC3SocksSelect";
        $QuantityName = "ManC3SocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 36);
    }

    if(isset($_POST["RealHomeShirt"])){
        $SelectName = "RealHomeShirtSelect";
        $QuantityName = "RealHomeShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 37);
    }

    if(isset($_POST["RealHomeShorts"])){
        $SelectName = "RealHomeShortsSelect";
        $QuantityName = "RealHomeShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 38);
    }

    if(isset($_POST["RealHomeSocks"])){
        $SelectName = "RealHomeSocksSelect";
        $QuantityName = "RealHomeSocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 39);
    }

    if(isset($_POST["RealAwayShirt"])){
        $SelectName = "RealAwayShirtSelect";
        $QuantityName = "RealAwayShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 40);
    }

    if(isset($_POST["RealAwayShorts"])){
        $SelectName = "RealAwayShortsSelect";
        $QuantityName = "RealAwayShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 41);
    }

    if(isset($_POST["RealAwaySocks"])){
        $SelectName = "RealAwaySocksSelect";
        $QuantityName = "RealAwaySocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 42);
    }

    if(isset($_POST["Real3Shirt"])){
        $SelectName = "Real3ShirtSelect";
        $QuantityName = "Real3ShirtQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 43);
    }

    if(isset($_POST["Real3Shorts"])){
        $SelectName = "Real3ShortsSelect";
        $QuantityName = "Real3ShortsQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 44);
    }

    if(isset($_POST["Real3Socks"])){
        $SelectName = "Real3SocksSelect";
        $QuantityName = "Real3SocksQuantity";
        ValidateToAddToMyCart($SelectName, $QuantityName, 45);
    }
    

    
    
    if(isset($_SESSION["Username"])){
        $AccountToAdd = "";
        $GetAllAccounts = "SELECT * FROM account";
        $GetAllAccountsResult = mysqli_query($link, $GetAllAccounts);
        while($Account = mysqli_fetch_assoc($GetAllAccountsResult)){
            if(password_verify($_SESSION["Username"], $Account["Username"])){
                $AccountToAdd =  $Account["Account_Id"];
            }
        }
        
        
        $GetOrderTableAccountsQuery = "SELECT * FROM order_table";
        $GetOrderTableAccountsResult = mysqli_query($link, $GetOrderTableAccountsQuery);
        $OrderTableArray = array();
        while($GetOrderTableAccounts = mysqli_fetch_assoc($GetOrderTableAccountsResult)){
            $OrderTableArray[] = $GetOrderTableAccounts["Account_Id"];
        }
        if(in_array($AccountToAdd, $OrderTableArray)){
            
        }
        else{
            $InsertAccountId = "INSERT INTO order_table(Account_Id) VALUES ('$AccountToAdd')";
            $InsertAccountIdResult = mysqli_query($link, $InsertAccountId);
        }
        
        include "header.php";
        echo "<div id = 'MainContent'>
        <aside id = 'LeftSide'>
            <h4> Jump to Team </h4>
            <a href = '#Juve'>
                <div id = 'JuventusLink'>
                    <img src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Juventus_FC_2017_logo.svg/2000px-Juventus_FC_2017_logo.svg.png' alt = 'Juventus Logo'>
                    <span> Juventus F.C. </span>
                </div>
            </a>
            <a href = '#Bayern'>
                <div id = 'BayernMunichLink'>
                    <img src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg/220px-FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg.png' alt = 'FC Bayern Munich Logo'>
                    <span>  F.C. Bayern Munich </span>
                </div>
            </a>
            <a href = '#PSG'>
                <div id = 'PSGLink'>
                    <img src = 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a7/Paris_Saint-Germain_F.C..svg/1200px-Paris_Saint-Germain_F.C..svg.png' alt = 'PSG Logo'>
                    <span> Paris Saint-Germain F.C. </span>
                </div>
            </a>
            <a href = '#ManC'>
                <div id = 'ManCityLink'>
                    <img src = 'https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/1200px-Manchester_City_FC_badge.svg.png' alt = 'Manchester City Logo'>
                    <span>Manchester City F.C. </span>
                </div>
            </a>
            <a href = '#Real'>
                <div id = 'RealMadridLink'>
                    <img src = 'https://orig00.deviantart.net/2d85/f/2012/310/a/0/real_madrid_logo_transparent_png_by_4lifebenji-d5k7nnq.png' alt = 'Real Madrid Logo'>
                    <span>Real Madrid C.F. </span>
                </div>
            </a>
        </aside>
        <div id = 'Catalogue'>
            <form action = 'Menu.php' method = 'post'>
            <div id = 'Juve'>
                <p id = 'TeamTitle'><b>  --------------------------------------- Juventus F.C. -------------------------------------- </b></p>
                <br/>
                <b><u><p id = 'HomeTitle'> Home Kit </p></u></b>
                <div id = 'HomeDiv'>"; 
                $JuveHomeShirtQuery = "SELECT * FROM product WHERE Product_Id = 1";
                $JuveHomeShirtResult = mysqli_query($link, $JuveHomeShirtQuery);
                while($JuveHomeShirt = mysqli_fetch_assoc($JuveHomeShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $JuveHomeShirt["URL"] ."' alt = 'Juve Jersey Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'JuveHomeShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveHomeShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;35.50</s></span></p>
                                <p> Price: &euro;". $JuveHomeShirt["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveHomeShirt' id = 'JuveHomeShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $JuveHomeShortsQuery = "SELECT * FROM product WHERE Product_Id = 2";
                $JuveHomeShortsResult = mysqli_query($link, $JuveHomeShortsQuery);
                while($JuveHomeShorts = mysqli_fetch_assoc($JuveHomeShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $JuveHomeShorts["URL"] ."' alt = 'Juve Shorts Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'JuveHomeShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveHomeShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;20.50</s></span></p>
                                <p> Price: &euro;". $JuveHomeShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveHomeShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $JuveHomeSocksQuery = "SELECT * FROM product WHERE Product_Id = 3";
                $JuveHomeSocksResult = mysqli_query($link, $JuveHomeSocksQuery);
                while($JuveHomeSocks = mysqli_fetch_assoc($JuveHomeSocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $JuveHomeSocks["URL"] ."' alt = 'Juve Socks Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'JuveHomeSocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveHomeSocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;18.00</s></span></p>
                                <p> Price: &euro;". $JuveHomeSocks["Price"] ." </p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveHomeSocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'AwayTitle'> Away Kit </p></u></b>
                    <div id = 'AwayDiv'>";
                }
                $JuveAwayShirtQuery = "SELECT * FROM product WHERE Product_Id = 4";
                $JuveAwayShirtResult = mysqli_query($link, $JuveAwayShirtQuery);
                while($JuveAwayShirt = mysqli_fetch_assoc($JuveAwayShirtResult)){
                        echo "<div id = 'Jersey'>
                        <img src = '". $JuveAwayShirt["URL"] ."' alt = 'Juve Jersey Away' id = 'Image'>
                        <div id = 'ProductInfo'>
                            <h1>Jersey 2017/2018</h1>
                            <br/>
                            <label for = 'quantity'> Quantity: </label>
                            <input type = 'number' name = 'JuveAwayShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveAwayShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                            <p><span> Was: </span><span><s>&euro;35.50</s></span></p>
                            <p> Price: &euro;". $JuveAwayShirt["Price"]."</p>
                            <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveAwayShirt'>
                        </div>
                         </div>
                        <div class = 'clear'></div>";
                }
                $JuveAwayShortsQuery = "SELECT * FROM product WHERE Product_Id = 5";
                $JuveAwayShortsResult = mysqli_query($link, $JuveAwayShortsQuery);
                while($JuveAwayShorts = mysqli_fetch_assoc($JuveAwayShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $JuveAwayShorts["URL"] ."' alt = 'Juve Shorts Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'JuveAwayShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveAwayShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;40.00</s></span></p>
                                <p> Price: &euro;".  $JuveAwayShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveAwayShorts'>
                                </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $JuveAwaySocksQuery = "SELECT * FROM product where Product_Id = 6";
                $JuveAwaySocksResult = mysqli_query($link, $JuveAwaySocksQuery);
                while($JuveAwaySocks = mysqli_fetch_assoc($JuveAwaySocksResult)){
                    echo "<div id = 'Socks'>
                        <img src = '". $JuveAwaySocks["URL"] ."' alt = 'Juve Socks Away' id = 'Image'>
                        <div id = 'ProductInfo'>
                            <h1>Socks 2017/2018</h1>
                            <label for = 'quantity'> Quantity: </label>
                            <input type = 'number' name = 'JuveAwaySocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'JuveAwaySocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                            <p><span> Was: </span><span><s>&euro;18.00</s></span></p>
                            <p> Price: &euro;". $JuveAwaySocks["Price"] ."</p>
                            <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'JuveAwaySocks'>
                        </div>
                    </div>
                </div>
                <div class = 'clear'></div>
                <br/>
                <b><u><p id = 'ThirdTitle'> Third Kit </p></u></b>
                <div id = 'ThirdDiv'>";
                }
                $Juve3ShirtQuery = "SELECT * FROM product WHERE Product_Id = 7";
                $Juve3ShirtResult = mysqli_query($link, $Juve3ShirtQuery);
                while($Juve3Shirt = mysqli_fetch_assoc($Juve3ShirtResult)){
                    echo "<div id = 'Jersey'>
                    <img src = '". $Juve3Shirt["URL"] . "' alt = 'Juve Jersey 3' id = 'Image'>
                    <div id = 'ProductInfo'>
                        <h1>Jersey 2017/2018</h1>
                        <br/>
                        <label for = 'quantity'> Quantity: </label>
                        <input type = 'number' name = 'Juve3ShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Juve3ShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                        <p><span> Was: </span><span><s>&euro;30.50</s></span></p>
                        <p> Price: &euro;". $Juve3Shirt["Price"] . "</p>
                        <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Juve3Shirt'>
                    </div>
                </div>
                <div class = 'clear'></div>";
                }
                $Juve3ShortsQuery = "SELECT * FROM product WHERE Product_Id = 8";
                $Juve3ShortsResult = mysqli_query($link, $Juve3ShortsQuery);
                while($Juve3Shorts = mysqli_fetch_assoc($Juve3ShortsResult)){
                     echo "<div id = 'Shorts'>
                            <img src = '". $Juve3Shorts["URL"] ."' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Juve3ShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Juve3ShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;20.00</s></span></p>
                                <p> Price: &euro;". $Juve3Shorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Juve3Shorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $Juve3SocksQuery = "SELECT * FROM product WHERE Product_Id = 9";
                $Juve3SocksResult = mysqli_query($link, $Juve3SocksQuery);
                while($Juve3Socks = mysqli_fetch_assoc($Juve3SocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $Juve3Socks["URL"] ."' alt = 'Juve Socks 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Juve3SocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Juve3SocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;18.00</s></span></p>
                                <p> Price: &euro;". $Juve3Socks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Juve3Socks'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = 'clear'></div>";
                }
                $BayernHomeShirtQuery = "SELECT * FROM product WHERE Product_Id = 10";
                $BayernHomeShirtResult = mysqli_query($link, $BayernHomeShirtQuery);
                while($BayernHomeShirt = mysqli_fetch_assoc($BayernHomeShirtResult)){
                    echo "<div id = 'Bayern'>
                           <p id = 'TeamTitle'><b>  -------------------------------------- F.C. Bayern Munich ---------------------------------- </b></p>
                            <br/>
                            <b><u><p id = 'HomeTitle'> Home Kit </p></u></b>
                            <div id = 'HomeDiv'>
                                <div id = 'Jersey'>
                                    <img src = '". $BayernHomeShirt["URL"] ."' alt = 'Bayern Jersey Home' id = 'Image'>
                                    <div id = 'ProductInfo'>
                                        <h1>Jersey 2017/2018</h1>
                                        <br/>
                                        <label for = 'quantity'> Quantity: </label>
                                        <input type = 'number' name = 'BayernHomeShirtQuantity'><br/>
                                        <label> Size: </label>
                                        <select name = 'BayernHomeShirtSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                        <p><span> Was: </span><span><s>&euro;30.50</s></span></p>
                                        <p> Price: &euro;". $BayernHomeShirt["Price"] ."</p>
                                        <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernJerseyHome'>
                                    </div>
                                </div>
                                <div class = 'clear'></div>";
                }
                $BayernHomeShortsQuery = "SELECT * FROM product WHERE Product_Id = 11";
                $BayernHomeShortsResult = mysqli_query($link, $BayernHomeShortsQuery);
                while($BayernHomeShorts = mysqli_fetch_assoc($BayernHomeShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $BayernHomeShorts["URL"] ."' alt = 'Bayern Shorts Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'BayernHomeShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'BayernHomeShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;20.50</s></span></p>
                                <p> Price: &euro;". $BayernHomeShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernHomeShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $BayernHomeSocksQuery = "SELECT * FROM product WHERE Product_Id = 12";
                $BayernHomeSocksResult = mysqli_query($link, $BayernHomeSocksQuery);
                while($BayernHomeSocks = mysqli_fetch_assoc($BayernHomeSocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $BayernHomeSocks["URL"] ."' alt = 'Bayern Socks Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'BayernHomeSocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'BayernHomeSocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                <p> Price: &euro;". $BayernHomeSocks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernHomeSocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'AwayTitle'> Away Kit </p></u></b>
                    <div id = 'AwayDiv'>";
                }
                $BayernAwayShirtQuery = "SELECT * FROM product WHERE Product_Id = 13";
                $BayernAwayShirtResult = mysqli_query($link, $BayernAwayShirtQuery);
                while($BayernAwayShirt = mysqli_fetch_assoc($BayernAwayShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $BayernAwayShirt["URL"] . "' alt = 'Bayern Jersey Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'BayernAwayShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'BayernAwayShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;31.00</s></span></p>
                                <p> Price: &euro;". $BayernAwayShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernAwayJersey'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $BayernAwayShortsQuery = "SELECT * FROM product WHERE Product_Id = 14";
                $BayernAwayShortsResult = mysqli_query($link, $BayernAwayShortsQuery);
                while($BayernAwayShorts  = mysqli_fetch_assoc($BayernAwayShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $BayernAwayShorts["URL"] ."' alt = 'Bayern Shorts Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'BayernAwayShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'BayernAwayShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;18.50</s></span></p>
                                <p> Price: &euro;". $BayernAwayShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernAwayShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $BayernAwaySocksQuery = "SELECT * FROM product WHERE Product_Id = 15";
                $BayernAwaySocksResult = mysqli_query($link, $BayernAwaySocksQuery);
                while($BayernAwaySocks = mysqli_fetch_assoc($BayernAwaySocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $BayernAwaySocks["URL"] ."' alt = 'Bayern Socks Away' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'BayernAwaySocksQuantity'><br/>
                                    <label> Size: </label>
                                    <select name = 'BayernAwaySocksSelect'>
                                        <option value = '0' selected> Select Size </option>
                                        <option value = '1'> Extra Small </option>
                                        <option value = '2'> Small </option>
                                        <option value = '3'> Medium </option>
                                        <option value = '4'> Large </option>
                                        <option value = '5'> Extra Large </option>
                                        <option value = '6'> Extra Extra Large </option>
                                    </select>
                                    <p><span> Was: </span><span><s>&euro;18.00</s></span></p>
                                    <p> Price: &euro;". $BayernAwaySocks["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'BayernAwaySocks'>
                                </div>
                            </div>
                        </div>
                        <div class = 'clear'></div>
                        <br/>
                        <b><u><p id = 'ThirdTitle'> Third Kit </p></u></b>
                        <div id = 'ThirdDiv'>";
                }
                $Bayern3ShirtQuery = "SELECT * FROM product WHERE Product_Id = 16";
                $Bayern3ShirtResult = mysqli_query($link, $Bayern3ShirtQuery);
                while($Bayern3Shirt = mysqli_fetch_assoc($Bayern3ShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $Bayern3Shirt["URL"] ."' alt = 'Bayern Jersey 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Bayern3ShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Bayern3ShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;32.00</s></span></p>
                                <p> Price: &euro;". $Bayern3Shirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Bayern3Shirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $Bayern3ShortsQuery = "SELECT * FROM product WHERE Product_Id = 17";
                $Bayern3ShortsResult = mysqli_query($link, $Bayern3ShortsQuery);
                while($Bayern3Shorts = mysqli_fetch_assoc($Bayern3ShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $Bayern3Shorts["URL"] ."' alt = 'Bayern Shorts 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Bayern3ShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Bayern3ShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;20.50</s></span></p>
                                <p> Price: &euro;". $Bayern3Shorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Bayern3Shorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $Bayern3SocksQuery = "SELECT * FROM product WHERE Product_Id = 18";
                $Bayern3SocksResult = mysqli_query($link, $Bayern3SocksQuery);
                while($Bayern3Socks = mysqli_fetch_assoc($Bayern3SocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $Bayern3Socks["URL"] ."' alt = 'Bayern Socks 3' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'Bayern3SocksQuantity'><br/>
                                    <label> Size: </label>
                                    <select name = 'Bayern3SocksSelect'>
                                        <option value = '0' selected> Select Size </option>
                                        <option value = '1'> Extra Small </option>
                                        <option value = '2'> Small </option>
                                        <option value = '3'> Medium </option>
                                        <option value = '4'> Large </option>
                                        <option value = '5'> Extra Large </option>
                                        <option value = '6'> Extra Extra Large </option>
                                    </select>
                                    <p><span> Was: </span><span><s>&euro;18.50</s></span></p>
                                    <p> Price: &euro;". $Bayern3Socks["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Bayern3Socks'>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>";
                }
                $PSGHomeShirtQuery = "SELECT * FROM product WHERE Product_Id = 19";
                $PSGHomeShirtResult = mysqli_query($link, $PSGHomeShirtQuery);
                while($PSGHomeShirt = mysqli_fetch_assoc($PSGHomeShirtResult)){
                    echo "<div id = 'PSG'>
                            <p id = 'TeamTitle'><b>  ----------------------------------- Paris Saint-Germain F.C. ------------------------------ </b></p>
                            <br/>
                            <b><u><p id = 'HomeTitle'> Home Kit </p></u></b>
                            <div id = 'HomeDiv'>
                                <div id = 'Jersey'>
                                    <img src = '". $PSGHomeShirt["URL"] ."' alt = 'PSG Jersey Home' id = 'Image'>
                                    <div id = 'ProductInfo'>
                                        <h1>Jersey 2017/2018</h1>
                                        <br/>
                                        <label for = 'quantity'> Quantity: </label>
                                        <input type = 'number' name = 'PSGHomeShirtQuantity'><br/>
                                        <label> Size: </label>
                                        <select name = 'PSGHomeShirtSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                        <p><span> Was: </span><span><s>&euro;25.00</s></span></p>
                                        <p> Price: &euro;". $PSGHomeShirt["Price"] ."</p>
                                        <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGHomeShirt'>
                                    </div>
                                </div>
                                <div class = 'clear'></div>";
                }
                $PSGHomeShortsQuery = "SELECT * FROM product WHERE Product_Id = 20";
                $PSGHomeShortsResult = mysqli_query($link, $PSGHomeShortsQuery);
                while($PSGHomeShorts = mysqli_fetch_assoc($PSGHomeShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $PSGHomeShorts["URL"] ."' alt = 'PSG Shorts Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSGHomeShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'PSGHomeShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;20.50</s></span></p>
                                <p> Price: &euro;". $PSGHomeShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGHomeShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $PSGHomeSocksQuery = "SELECT * FROM product WHERE Product_Id = 21";
                $PSGHomeSocksResult = mysqli_query($link, $PSGHomeSocksQuery);
                while($PSGHomeSocks = mysqli_fetch_assoc($PSGHomeSocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $PSGHomeSocks["URL"] ."' alt = 'PSG Socks Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSGHomeSocksQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSGHomeSocksSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                <p> Price: &euro;". $PSGHomeSocks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGHomeSocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'AwayTitle'> Away Kit </p></u></b>
                    <div id = 'AwayDiv'>";
                }
                $PSGAwayShirtQuery = "SELECT * FROM product WHERE Product_Id = 22";
                $PSGAwayShirtResult = mysqli_query($link, $PSGAwayShirtQuery);
                while($PSGAwayShirt = mysqli_fetch_assoc($PSGAwayShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $PSGAwayShirt["URL"] ."' alt = 'PSG Jersey Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSGAwayShirtQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSGAwayShirtSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                <p><span> Was: </span><span><s>&euro;21.50</s></span></p>
                                <p> Price: &euro;". $PSGAwayShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGAwayShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $PSGAwayShortsQuery = "SELECT * FROM product WHERE Product_Id = 23";
                $PSGAwayShortsResult = mysqli_query($link, $PSGAwayShortsQuery);
                while($PSGAwayShorts = mysqli_fetch_assoc($PSGAwayShortsResult)){
                    echo "<div id = 'Shorts'>
                                <img src = '". $PSGAwayShorts["URL"] ."' alt = 'PSG Shorts Away' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Shorts 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'PSGAwayShortsQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSGAwayShortsSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                    <p><span> Was: </span><span><s>&euro;40.00</s></span></p>
                                    <p> Price: &euro; 30.00</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGAwayShorts'>
                                </div>
                            </div>
                            <div class = 'clear'></div>";
                }
                $PSGAwaySocksQuery = "SELECT * FROM product WHERE Product_Id = 24";
                $PSGAwaySocksResult = mysqli_query($link, $PSGAwaySocksQuery);
                while($PSGAwaySocks = mysqli_fetch_assoc($PSGAwaySocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $PSGAwaySocks["URL"] ."' alt = 'PSG Socks Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSGAwaySocksQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSGAwaySocksSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                <p> Price: &euro;". $PSGAwaySocks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSGAwaySocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'ThirdTitle'> Third Kit </p></u></b>
                    <div id = 'ThirdDiv'>";
                }
                $PSG3ShirtQuery = "SELECT * FROM product WHERE Product_Id = 25";
                $PSG3ShirtResult = mysqli_query($link, $PSG3ShirtQuery);
                while($PSG3Shirt = mysqli_fetch_assoc($PSG3ShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $PSG3Shirt["URL"] ."' alt = 'PSG Jersey 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSG3ShirtQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSG3ShirtSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select></span></p>
                                <p> Price: &euro;". $PSG3Shirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSG3Shirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $PSG3ShortsQuery = "SELECT * FROM product WHERE Product_Id = 26";
                $PSG3ShortsResult = mysqli_query($link, $PSG3ShortsQuery);
                while($PSG3Shorts = mysqli_fetch_assoc($PSG3ShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $PSG3Shorts["URL"] ."' alt = 'PSG Shorts 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'PSG3ShortsQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSG3ShortsSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                <p><span> Was: </span><span><s>&euro;18.50</s></span></p>
                                <p> Price: &euro;". $PSG3Shorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSG3Shorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $PSG3SocksQuery = "SELECT * FROM product WHERE Product_Id = 27";
                $PSG3SocksResult = mysqli_query($link, $PSG3SocksQuery);
                while($PSG3Socks = mysqli_fetch_assoc($PSG3SocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $PSG3Socks["URL"] ."' alt = 'PSG Socks 3' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'PSG3SocksQuantity'><br/>
                                <label> Size: </label>
                                        <select name = 'PSG3SocksSelect'>
                                            <option value = '0' selected> Select Size </option>
                                            <option value = '1'> Extra Small </option>
                                            <option value = '2'> Small </option>
                                            <option value = '3'> Medium </option>
                                            <option value = '4'> Large </option>
                                            <option value = '5'> Extra Large </option>
                                            <option value = '6'> Extra Extra Large </option>
                                        </select>
                                    <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                    <p> Price: &euro;". $PSG3Socks["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'PSG3Socks'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <div id = 'ManC'>
                        <p id = 'TeamTitle'><b>  ----------------------------------- Manchester City F.C. ---------------------------------- </b></p>
                        <br/>
                        <b><u><p id = 'HomeTitle'> Home Kit </p></u></b>
                        <div id = 'HomeDiv'>";
                }
                $ManCHomeShirtQuery = "SELECT * FROM product WHERE Product_Id = 28";
                $ManCHomeShirtResult = mysqli_query($link, $ManCHomeShirtQuery);
                while($ManCHomeShirt = mysqli_fetch_assoc($ManCHomeShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $ManCHomeShirt["URL"] ."' alt = 'ManC Jersey Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCHomeShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCHomeShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;25.00</s></span></p>
                                <p> Price: &euro;". $ManCHomeShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCHomeShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $ManCHomeShortsQuery = "SELECT * FROM product WHERE Product_Id = 29";
                $ManCHomeShortsResult = mysqli_query($link, $ManCHomeShortsQuery);
                while($ManCHomeShorts = mysqli_fetch_assoc($ManCHomeShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $ManCHomeShorts["URL"] ."' alt = 'ManC Shorts Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCHomeShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCHomeShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;18.50</s></span></p>
                                <p> Price: &euro;". $ManCHomeShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCHomeShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $ManCHomeSocksQuery = "SELECT * FROM product WHERE Product_Id = 30";
                $ManCHomeSocksResult = mysqli_query($link, $ManCHomeSocksQuery);
                while($ManCHomeSocks = mysqli_fetch_assoc($ManCHomeSocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $ManCHomeSocks["URL"] ."' alt = 'ManC Socks Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCHomeSocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCHomeSocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;14.00</s></span></p>
                                <p> Price: &euro;". $ManCHomeSocks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCHomeSocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'AwayTitle'> Away Kit </p></u></b>
                    <div id = 'AwayDiv'>";
                }
                $ManCAwayShirtQuery = "SELECT * FROM product WHERE Product_Id = 31";
                $ManCAwayShirtResult = mysqli_query($link, $ManCAwayShirtQuery);
                while($ManCAwayShirt = mysqli_fetch_assoc($ManCAwayShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $ManCAwayShirt["URL"] ."' alt = 'ManC Jersey Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCAwayShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCAwayShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;21.00</s></span></p>
                                <p> Price: &euro;". $ManCAwayShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCAwayShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $ManCAwayShortsQuery = "SELECT * FROM product WHERE Product_Id = 32";
                $ManCAwayShortsResult = mysqli_query($link, $ManCAwayShortsQuery);
                while($ManCAwayShorts = mysqli_fetch_assoc($ManCAwayShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $ManCAwayShorts["URL"] ."' alt = 'ManC Shorts Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCAwaySjortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCAwayShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;21.50</s></span></p>
                                <p> Price: &euro;". $ManCAwayShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCAwayShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $ManCAwaySocksQuery = "SELECT * FROM product WHERE Product_Id = 33";
                $ManCAwaySocksResult = mysqli_query($link, $ManCAwaySocksQuery);
                while($ManCAwaySocks = mysqli_fetch_assoc($ManCAwaySocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $ManCAwaySocks["URL"] ."' alt = 'ManC Socks Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManCAwaySocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManCAwaySocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                <p> Price: &euro;". $ManCAwaySocks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManCAwaySocks'>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <br/>
                    <b><u><p id = 'ThirdTitle'> Third Kit </p></u></b>
                    <div id = 'ThirdDiv'>";
                }
                $ManC3ShirtQuery = "SELECT * FROM product WHERE Product_Id = 34";
                $ManC3ShirtResult = mysqli_query($link, $ManC3ShirtQuery);
                while($ManC3Shirt = mysqli_fetch_assoc($ManC3ShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $ManC3Shirt["URL"] ."' alt = 'ManC Jersey 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'ManC3ShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManC3ShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;21.50</s></span></p>
                                <p> Price: &euro;". $ManC3Shirt["Price"]. "</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManC3Shirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $ManC3ShortsQuery = "SELECT * FROM product WHERE Product_Id = 35";
                $ManC3ShortsResult = mysqli_query($link, $ManC3ShortsQuery);
                while($ManC3Shorts = mysqli_fetch_assoc($ManC3ShortsResult)){
                    echo " <div id = 'Shorts'>
                                <img src = '". $ManC3Shorts["URL"] ."' alt = 'ManC Shorts 3' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Shorts 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'ManC3ShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManC3ShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                    <p><span> Was: </span><span><s>&euro;17.50</s></span></p>
                                    <p> Price: &euro;". $ManC3Shorts["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManC3Shorts'>
                                </div>
                            </div>
                            <div class = 'clear'></div>";
                }
                $ManC3SocksQuery = "SELECT * FROM product WHERE Product_Id = 36";
                $ManC3SocksResult = mysqli_query($link, $ManC3SocksQuery);
                while($ManC3Socks = mysqli_fetch_assoc($ManC3SocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $ManC3Socks["URL"] ."' alt = 'ManC Socks 3' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'ManC3SocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'ManC3SocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                    <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                    <p> Price: &euro;". $ManC3Socks["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'ManC3Socks'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'clear'></div>
                    <div id = 'Real'>
                        <p id = 'TeamTitle'><b>  ------------------------------------- Real Madrid C.F. ------------------------------------ </b></p>
                        <br/>
                        <b><u><p id = 'HomeTitle'> Home Kit </p></u></b>
                        <div id = 'HomeDiv'>";
                }
                $RealHomeShirtQuery = "SELECT * FROM product WHERE Product_Id = 37";    
                $RealHomeShirtResult = mysqli_query($link, $RealHomeShirtQuery);   
                while($RealHomeShirt = mysqli_fetch_assoc($RealHomeShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $RealHomeShirt["URL"] ."' alt = 'Real Jersey Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'RealHomeShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'RealHomeShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;22.50</s></span></p>
                                <p> Price: &euro;". $RealHomeShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealHomeShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $RealHomeShortsQuery = "SELECT * FROM product WHERE Product_Id = 38";
                $RealHomeShortsResult = mysqli_query($link, $RealHomeShortsQuery);
                while($RealHomeShorts = mysqli_fetch_assoc($RealHomeShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $RealHomeShorts["URL"] ."' alt = 'Real Shorts Home' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'RealHomeSortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'RealHomeShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;17.50</s></span></p>
                                <p> Price: &euro;". $RealHomeShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealHomeShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $RealHomeSocksQuery = "SELECT * FROM product WHERE Product_Id = 39";
                $RealHomeSocksResult = mysqli_query($link, $RealHomeSocksQuery);
                while($RealHomeSocks = mysqli_fetch_assoc($RealHomeSocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $RealHomeSocks["URL"] ."' alt = 'Real Socks Home' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'RealHomeSocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'RealHomeSocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                    <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                    <p> Price: &euro; 15.00</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealHomeSocks'>
                                </div>
                            </div>
                        </div>
                        <div class = 'clear'></div>
                        <br/>
                        <b><u><p id = 'AwayTitle'> Away Kit </p></u></b>
                        <div id = 'AwayDiv'>";
                }
                $RealAwayShirtQuery = "SELECT * FROM product WHERE Product_Id = 40";
                $RealAwayShirtResult = mysqli_query($link, $RealAwayShirtQuery);
                while($RealAwayShirt = mysqli_fetch_assoc($RealAwayShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $RealAwayShirt["URL"] ."' alt = 'Real Jersey Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'RealAwayShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'RealAwayShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;22.50</s></span></p>
                                <p> Price: &euro;". $RealAwayShirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealAwayShirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $RealAwayShortsQuery = "SELECT * FROM product WHERE Product_Id = 41";
                $RealAwayShortsResult = mysqli_query($link, $RealAwayShortsQuery);
                while($RealAwayShorts = mysqli_fetch_assoc($RealAwayShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $RealAwayShorts["URL"] ."' alt = 'Real Shorts Away' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'RealAwayShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'RealAwayShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;17.50</s></span></p>
                                <p> Price: &euro;". $RealAwayShorts["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealAwayShorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $RealAwaySocksQuery = "SELECT * FROM product WHERE Product_Id = 42";
                $RealAwaySocksResult = mysqli_query($link, $RealAwaySocksQuery);
                while($RealAwaySocks = mysqli_fetch_assoc($RealAwaySocksResult)){
                    echo "<div id = 'Socks'>
                                <img src = '". $RealAwaySocks["URL"] ."' alt = 'Real Socks Away' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>Socks 2017/2018</h1>
                                    <br/>
                                    <label for = 'quantity'> Quantity: </label>
                                    <input type = 'number' name = 'RealAwaySocksQuantity'><br/>
                                <label> Size: </label>
                                    <select name = 'RealAwaySocksSelect'>
                                        <option value = '0' selected> Select Size </option>
                                        <option value = '1'> Extra Small </option>
                                        <option value = '2'> Small </option>
                                        <option value = '3'> Medium </option>
                                        <option value = '4'> Large </option>
                                        <option value = '5'> Extra Large </option>
                                        <option value = '6'> Extra Extra Large </option>
                                    </select>
                                    <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                    <p> Price: &euro;". $RealAwaySocks["Price"] ."</p>
                                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'RealAwaySocks'>
                                </div>
                            </div>
                        </div>
                        <div class = 'clear'></div>
                        <br/>
                        <b><u><p id = 'ThirdTitle'> Third Kit </p></u></b>
                        <div id = 'ThirdDiv'>";
                }
                $Real3ShirtQuery = "SELECT * FROM product WHERE Product_Id = 43";
                $Real3ShirtResult = mysqli_query($link, $Real3ShirtQuery);
                while($Real3Shirt = mysqli_fetch_assoc($Real3ShirtResult)){
                    echo "<div id = 'Jersey'>
                            <img src = '". $Real3Shirt["URL"] ."' alt = 'Real Jersey 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Jersey 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Real3ShirtQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Real3ShirtSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;22.50</s></span></p>
                                <p> Price: &euro;". $Real3Shirt["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Real3Shirt'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $Real3ShortsQuery = "SELECT * FROM product WHERE Product_Id = 44";
                $Real3ShortsResult = mysqli_query($link, $Real3ShortsQuery);
                while($Real3Shorts = mysqli_fetch_assoc($Real3ShortsResult)){
                    echo "<div id = 'Shorts'>
                            <img src = '". $Real3Shorts["URL"] ."' alt = 'Real Shorts 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Shorts 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Real3ShortsQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Real3ShortsSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;40.00</s></span></p>
                                <p> Price: &euro; 30.00</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Real3Shorts'>
                            </div>
                        </div>
                        <div class = 'clear'></div>";
                }
                $Real3SocksQuery = "SELECT * FROM product WHERE Product_Id = 45";
                $Real3SocksResult = mysqli_query($link, $Real3SocksQuery);
                while($Real3Socks = mysqli_fetch_assoc($Real3SocksResult)){
                    echo "<div id = 'Socks'>
                            <img src = '". $Real3Socks["URL"] ."' alt = 'Real Socks 3' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1>Socks 2017/2018</h1>
                                <br/>
                                <label for = 'quantity'> Quantity: </label>
                                <input type = 'number' name = 'Real3SocksQuantity'><br/>
                                <label> Size: </label>
                                <select name = 'Real3SocksSelect'>
                                    <option value = '0' selected> Select Size </option>
                                    <option value = '1'> Extra Small </option>
                                    <option value = '2'> Small </option>
                                    <option value = '3'> Medium </option>
                                    <option value = '4'> Large </option>
                                    <option value = '5'> Extra Large </option>
                                    <option value = '6'> Extra Extra Large </option>
                                </select>
                                <p><span> Was: </span><span><s>&euro;13.50</s></span></p>
                                <p> Price: &euro;". $Real3Socks["Price"] ."</p>
                                <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' name = 'Real3Socks'>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <aside id = 'RightSide'>
            </aside>
        </div>
        </form>
        <link rel = 'stylesheet' href = 'CSS/Menu.css'>
        <script src = 'Scripts/Menu.js'></script>
        <script src = 'https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>
    </body>
</html>";
}
    }
    else{
        header("Location: FirstPage.php");
    }

    
?>