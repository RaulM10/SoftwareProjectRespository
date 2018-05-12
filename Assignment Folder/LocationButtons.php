<?php
    if(isset($_POST["LogOutButton"])){
        header("Location: Logout.php");
    }
    if(isset($_POST["ImagesButton"])){
        header("Location: GalleryImages.php");
    }

    if(isset($_POST["HelpButton"])){
        //header("Location: Help.php");
    }

    if(isset($_POST["MyCartButton"])){
        header("Location: MyCart.php");
    }

    if(isset($_POST["FeedbackButton"])){
        //header("Location: Feedback.php");
    }

    if(isset($_POST["ContactPhoneButton"])){
        header("Location: ContactUs.php");
    }

    if(isset($_POST["ProductsButton"])){
        header("Location: Menu.php");
    }
?>