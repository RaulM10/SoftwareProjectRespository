<?php
    $link = mysqli_connect("localhost", "root", "", "sdprojectdb", 3306);
    if(mysqli_connect_errno()){
        echo "Error connecting to DB...". mysqli_connect_error();
    }
?>