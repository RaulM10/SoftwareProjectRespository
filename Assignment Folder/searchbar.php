<?php
    session_start();
    if(isset($_SESSION["Username"])){
        if(isset($_POST["SearchButton"])){
            include "connect.php";
            $SearchWord = $_POST["SearchField"];
            $GetId = "SELECT * FROM kit WHERE Type = $SearchWord";
            $GetIdResult = mysqli_query($link, $GetId) or die (mysqli_error($link));
            while($Id = mysqli_fetch_assoc($GetIdResult)){
                echo $Id["Kit_Id"];
                $ProductQuery = "SELECT * FROM product WHERE Kit_Id = ". $Id["Kit_Id"];
                $ProductResult = mysqli_query($link, $ProductQuery);
                while($Product = mysqli_fetch_assoc($ProductResult)){
                    echo "Polly";
                }
            }
        }
        else{}
    }
    else{
        header("Location: index.php");
    }

?>