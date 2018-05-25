<?php
    session_start();
    if(isset($_GET["OrderId"])){
        include "connect.php";
        $OrderId = $_GET["OrderId"];
        $DeleteQuery = "DELETE FROM order_product WHERE Order_Id = '$OrderId'";
        $Delete = mysqli_query($link, $DeleteQuery);
        if(mysqli_affected_rows($link) > 0){
            echo "<script>
                    alert('Products have been bought and are beginning to be shipped')
                </script>";
            header("Location: CheckoutPage.php?Bought=1");
        }
    }




?>