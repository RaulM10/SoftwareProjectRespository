<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "header.php";
        if(isset($_POST["SearchButton"])){
            $KitId = $ProdKitId = $ProdKitName = "";
            include "connect.php";
            $SearchWord = $_POST["SearchField"];
            $GetKitCategories = "SELECT * FROM kit";
            $GetKitCategoriesResult = mysqli_query($link, $GetKitCategories);
            $KitCategoriesArray = array();
            while($KitCategories = mysqli_fetch_assoc($GetKitCategoriesResult)){
                $KitCategoriesArray[] = $KitCategories["Type"];
            }
            if(in_array($SearchWord, $KitCategoriesArray)){
                $GetId = "SELECT * FROM kit WHERE Type = '$SearchWord'";
                $GetIdResult = mysqli_query($link, $GetId) or die (mysqli_error($link));
                while($Id = mysqli_fetch_assoc($GetIdResult)){
                    $KitId = $Id["Kit_Id"];

                }
                $ProductQuery = "SELECT * FROM product WHERE Kit_Id = '$KitId'";
                $ProductResult = mysqli_query($link, $ProductQuery);
                while($Product = mysqli_fetch_assoc($ProductResult)){
                    $ProdKitId = $Product["Cloth_Id"];
                    switch($ProdKitId){
                        case 1: $ProdKitName = "Jersey";
                                break;
                        case 2: $ProdKitName = "Shorts";
                                break;
                        case 3: $ProdKitName = "Socks";
                                break;
                    }
                     echo "<a href = 'Menu.php'><div id = 'Product'>
                                <img src = '". $Product["URL"] ."' alt = 'Search Image' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>$ProdKitName 2017/2018</h1>
                                    <br/>
                                    <p><span> Was: </span><span><s>&euro;". $Product["OldPrice"] ."</s></span></p>
                                    <p> Price: &euro;". $Product["Price"] ." </p>
                                </div>
                        </div></a>
                        <div class = 'clear'></div>";
                }
            }
            else{}
            $ClothId = $ProdClothId = $ProdClothName = "";
            $GetClothCategories = "SELECT * FROM cloth";
            $GetClothCategoriesResult = mysqli_query($link, $GetClothCategories);
            $ClothCategoriesArray = array();
            while($ClothCategories = mysqli_fetch_assoc($GetClothCategoriesResult)){
                $ClothCategoriesArray[] = $ClothCategories["Type"];
            }
            if(in_array($SearchWord, $ClothCategoriesArray)){
                $GetId = "SELECT * FROM cloth WHERE Type = '$SearchWord'";
                $GetIdResult = mysqli_query($link, $GetId) or die (mysqli_error($link));
                while($Id = mysqli_fetch_assoc($GetIdResult)){
                    $ClothId = $Id["Cloth_Id"];

                }
                $ProductQuery = "SELECT * FROM product WHERE Cloth_Id = '$ClothId'";
                $ProductResult = mysqli_query($link, $ProductQuery);
                while($Product = mysqli_fetch_assoc($ProductResult)){
                    $ProdKitId = $Product["Cloth_Id"];
                    switch($ProdKitId){
                        case 1: $ProdKitName = "Jersey";
                                break;
                        case 2: $ProdKitName = "Shorts";
                                break;
                        case 3: $ProdKitName = "Socks";
                                break;
                    }
                     echo "<a href = 'Menu.php'><div id = 'Product'>
                                <img src = '". $Product["URL"] ."' alt = 'Search Image' id = 'Image'>
                                <div id = 'ProductInfo'>
                                    <h1>$ProdKitName 2017/2018</h1>
                                    <br/>
                                    <p><span> Was: </span><span><s>&euro;>". $Product["OldPrice"] ."</s></span></p>
                                    <p> Price: &euro;". $Product["Price"] ." </p>
                                </div>
                        </div></a>
                        <div class = 'clear'></div>";
                }
        
        
        
        
        
        }
        else{}
        $TeamId = $ProdTeamId = $ProdTeamName = "";
        $GetTeamCategories = "SELECT * FROM team";
        $GetTeamCategoriesResult = mysqli_query($link, $GetTeamCategories) or die (mysqli_error($link));
        $TeamCategoriesArray = array();
        while($TeamCategories = mysqli_fetch_assoc($GetTeamCategoriesResult)){
            $TeamCategoriesArray[] = $TeamCategories["Name"];
        }
        if(in_array($SearchWord, $TeamCategoriesArray)){
            $GetId = "SELECT * FROM team WHERE Name = '$SearchWord'";
            $GetIdResult = mysqli_query($link, $GetId) or die (mysqli_error($link));
            while($Id = mysqli_fetch_assoc($GetIdResult)){
                $TeamId = $Id["Team_Id"];
                echo $TeamId;
            }
            $ProductQuery = "SELECT * FROM product WHERE Team_Id = '$TeamId'";
            $ProductResult = mysqli_query($link, $ProductQuery) or die (mysqli_error($link));
            while($Product = mysqli_fetch_assoc($ProductResult)){
                $ProdKitId = $Product["Cloth_Id"];
                switch($ProdKitId){
                    case 1: $ProdKitName = "Jersey";
                            break;
                    case 2: $ProdKitName = "Shorts";
                            break;
                    case 3: $ProdKitName = "Socks";
                            break;
                }
                switch($SearchWord){
                    case "Juventus": $DivName = "Juve";
                                    break;
                    case "Bayern Munich": $DivName = "Bayern";
                                        break;
                    case "Paris Saint Germain": $DivName = "PSG";
                                            break;
                    case "Mmanchester City": $DivName = "ManC";
                                            break;
                    case "Real Madrid": $DivName = "Real";
                                    break;
                }
                 echo "<a href = 'Menu.php#". $DivName ."'><div id = 'Product'>
                            <img src = '". $Product["URL"] ."' alt = 'Search Image' id = 'Image'>
                            <div id = 'ProductInfo'>
                                <h1> $ProdKitName 2017/2018</h1>
                                <br/>
                                <p><span> Was: </span><span><s>&euro;". $Product["OldPrice"] ."</s></span></p>
                                <p> Price: &euro;". $Product["Price"] ." </p>
                            </div>
                    </div></a>
                    <div class = 'clear'></div>";
            }
        
        }
        else{}
    }
    else{}
    echo "<link rel = 'stylesheet' type = 'text/css' href = 'CSS/searchbar.css'>";
    
    
    }
    else{
        header("Location: index.php");
    }
?>