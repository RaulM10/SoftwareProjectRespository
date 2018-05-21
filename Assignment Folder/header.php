<?php
    include "LocationButtons.php";
    echo "<!DOCTYPE html>
                <html lang = 'en'>
                    <head>
                        <title> Football Sportswear </title>
                        <meta charset='utf-8'>
                        <meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin = 'anonymous'>
                        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' integrity='sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp' crossorigin='anonymous'>
                    </head>
                    <body>
                        <nav class = 'navbar navbar-expand-lg navbar-light' style = 'background-color: #006994; padding: 40px;'>
                        <span id = 'LoggedInUsername'><a href = '#'>  You are Logged In as ". $_SESSION["Username"] ."</a></span>
                        <a href = '#'><img src = 'Images/Logo.png' id = 'MainLogo' alt = 'Main Icon'></a>
                        <a class = 'navbar-brand text-danger' href = '#'>Football Sportswear</a>
                        <form class = 'form-inline ml-5' action = 'searchbar.php' method = 'post'>
                            <input class = 'form-control mr-3' type = 'search' placeholder = 'Search' aria-label = 'Search' name = 'SearchField' autocomplete = 'off'>
                            <button class = 'btn btn-outline-success' name = 'SearchButton'><i class='fa fa-search fa-2x'></i></button>
                        </form>
                        <form action = 'LocationButtons.php' method = 'post'>
                            <div class = 'ProductsButton'><button class = 'btn btn-outline-warning' name = 'ProductsButton'><i class = 'fab fa-product-hunt fa-2x'></i></button>
                                <span class = 'ProductsText'> Show Products </span>
                            </div>
                            <div class = 'HelpButton'><button class = 'btn btn-outline-warning' name = 'HelpButton'><i class='fas fa-question-circle fa-2x'></i></button>
                                <span class = 'HelpText'> Help </span>
                            </div>
                            <div class = 'ContactPhoneButton'><button class = 'btn btn-outline-warning' name = 'ContactPhoneButton'><i class = 'fas fa-phone fa-2x'></i></button>
                                <span class = 'ContactPhoneText'> Contact Us </span>
                            </div>
                            <div class = 'FeedbackButton'><button class = 'btn btn-outline-warning' name = 'FeedbackButton'><i class = 'fas fa-comment fa-2x'></i></button>
                                <span class = 'FeedbackText'> Give Feedback </span>
                            </div>
                            <div class = 'ImagesButton'>
                                <button class = 'btn btn-outline-warning' name = 'ImagesButton'><i class = 'fas fa-images fa-2x'></i>
                                </button>
                                <span class = 'ImagesText'> Gallery </span>
                            </div>
                            <div class = 'MyCartButton'><button class = 'btn btn-outline-warning' name = 'MyCartButton'><i class = 'fas fa-shopping-cart fa-2x'></i></button>
                                <span class = 'MyCartText'> My Cart </span>
                            </div>
                            <div class = 'LogOutButton'><button class = 'btn btn-outline-warning' name = 'LogOutButton'><i class = 'fas fa-sign-out-alt fa-2x'><a href = 'Logout.php'></a></i></button>
                                <span class = 'LogOutText'> Log Out </span>
                            </div>
                        </form>
                            <button class = navbar-toggler type = 'button' data-toggle = 'collapse' data-target = '#Nav' aria-controls = 'Nav' aria-expanded = 'false' aria-label = 'Toggle navigation'>
                                <span class = 'navbar-toggler-icon'></span>
                            </button>
                            <div class = 'collapse navbar-collapse' id = 'Nav'>
                            </div>
                        </nav>";
?>