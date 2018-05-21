<?php
    session_start();
    if(isset($_POST["register"])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["EmailAddress"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $RegUsername = $_POST["RegUsername"];
        $RegPassword = $_POST["RegPassword"];
        $RegPassword2 = $_POST["RegPassword2"];
        $HashedPassword;
        $nameBool = $surnameBool = $cityBool = $countryBool = $emailBool = $RegUsernameBool = $RegPasswordBool = $RegPassword2Bool = false;
        #Name Validation
        if(empty($name)){
            echo "<style type = 'text/css'>
                    #Name{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $nameBool = false;
            for($n = 0; $n < (strlen($name)); $n++){
                if(is_numeric($name[$n])){
                    $nameBool = true;
                }
            }
            if($nameBool == true){
                echo "<style type = 'text/css'>
                    #Name{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
            else{
                $nameBool = false;
                echo "<style type = 'text/css'>
                        #Name{
                            border: 1px #00ff00 solid;
                        }
                      </stle>";
            }
        }

        #Surname Validation
        if(empty($surname)){
            echo "<style type = 'text/css'>
                    #Surname{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            for($sn = 0; $sn < (strlen($surname)); $sn++){
                if(is_numeric($surname[$sn])){
                    $surnameBool = true;
                }
            }
            if($surnameBool == true){
                echo "<style type = 'text/css'>
                    #Surname{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
            else{
                $surnameBool = false;
                echo "<style type = 'text/css'>
                        #Surname{
                            border: 1px #00ff00 solid;
                        }
                      </style>";
            }
        }

        #Email Address Validation
        if(empty($email)){
            echo "<style type = 'text/css'>
                    #Address{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $emailBool = false;
            echo "<style type = 'text/css'>
                    #Address{
                        border: 1px #00ff00 solid;
                    }
                  </style>";

        }

        #City Validation
        if(empty($city)){
            echo "<style type = 'text/css'>
                    #City{
                        border: 1px #ff0000 solid;
                    }
                  </style>";

        }
        else{
            $cityBool = false;
            for($c = 0; $c < (strlen($city)); $c++){
                if(is_numeric($city[$c])){
                    $cityBool = true;
                }
            }
            if($cityBool == true){
                echo "<style type = 'text/css'>
                    #City{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
            else{
                $cityBool = false;
                echo "<style type = 'text/css'>
                        #City{
                            border: 1px #00ff00 solid;
                        }
                      </style>";
            }
        }

        #Country Validation
        if(empty($country)){
            echo "<style type = 'text/css'>
                    #Country{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $countryBool = false;
            for($cn = 0; $cn < (strlen($country)); $cn++){
                if(is_numeric($country[$cn])){
                    $countryBool = true;
                }
            }
            if($countryBool == true){
                echo "<style type = 'text/css'>
                    #Country{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
            else{
                $countryBool = false;
                echo "<style type = 'text/css'>
                        #Country{
                            border: 1px #00ff00 solid;
                        }
                      </style>";
            }
        }

        #Registration Username Validation
        if(empty($RegUsername)){
            echo "<style type = 'text/css'>
                    #RegUsername{
                        border: 1px #ff0000 solid;
                    }
                  </style>";    
        }
        else{
            echo "<style type = 'text/css'>
                    #RegUsername{
                        border: 1px #00ff00 solid;
                    }
                  </style>";
        }

        #Registration Password Validation
        if(empty($RegPassword)){
            echo "<style type = 'text/css'>
                    #RegPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";

        }
        else{
            echo "<style type = 'text/css'>
                    #RegPassword{
                        border: 1px #00ff00 solid;
                    }
                  </style>";
        }

        #Registration Password 2  Validation
        if(empty($RegPassword2)){
            echo "<style type = 'text/css'>
                    #RptPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            echo "<style type = 'text/css'>
                    #RptPassword{
                        border: 1px #00ff00 solid;
                    }
                  </style>";
        }

        if(!$nameBool && !$surnameBool && !$cityBool && !$countryBool && !$emailBool && !$RegUsernameBool && !$RegPasswordBool && !$RegPassword2Bool){
            if(strcmp($RegPassword, $RegPassword2)){
                echo "<style type = 'text/css'>
                    #RptPassword{
                        border: 1px #ff0000 solid;
                    }
                    #RegPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
            }
            else{
                include "connect.php";

                #Country Check
                $CheckCountry = "SELECT * FROM country";
                $CheckCountryResult = mysqli_query($link, $CheckCountry);
                $CountryArray = array();
                while($CountryRow = mysqli_fetch_assoc($CheckCountryResult)){
                        $CountryArray[] = $CountryRow["Name"];
                }
                if(in_array($country, $CountryArray)){}
                else{
                    $CountryQuery = "INSERT INTO country(Name) VALUES('$country')";
                    $CountryResult = mysqli_query($link, $CountryQuery);
                }

                #CityCheck
                $CheckCity = "SELECT * FROM town";
                $CheckCityResult = mysqli_query($link, $CheckCity);
                $CityArray = array();
                while($CityRow = mysqli_fetch_assoc($CheckCityResult)){
                        $CityArray[] = $CityRow["Name"];
                }
                if(in_array($city, $CityArray)){}
                else{
                    settype($country, "string");
                    $CountryStmt = "SELECT Country_Id FROM country WHERE Name = '$country'";
                    $CountryStmtResult = mysqli_query($link, $CountryStmt);
                    while($CountryString = mysqli_fetch_assoc($CountryStmtResult)){
                        $CountryAns = $CountryString["Country_Id"];
                        $CityInsertQuery = "INSERT INTO town(Name, Country_Id) VALUES('$city', '$CountryAns')";
                        $CityExecute = mysqli_query($link, $CityInsertQuery);
                    }   
                }

                #Account Check
                settype($RegUsername, "string");
                settype($RegPassword, "string");
                $CheckAccount = "SELECT * FROM account";
                $CheckAccountResult = mysqli_query($link, $CheckAccount);
                $AccountArray = array();
                while($AccountRow = mysqli_fetch_assoc($CheckAccountResult)){
                        $AccountArray[] = $AccountRow["Username"];
                }
                if(in_array($RegUsername, $AccountArray)){
                    echo "<style type = 'text/css'>
                            #RegUsername{
                                border: 1px #ff0000 solid;
                            }
                          </style>";
                }
                else{
                    $HashedUsername = password_hash($RegUsername, PASSWORD_DEFAULT);
                    $HashedPassword = password_hash($RegPassword, PASSWORD_DEFAULT);
                    $RegisterQuery = "INSERT INTO account(Username, Password) VALUES('$HashedUsername', '$HashedPassword')";
                    $RegisterAccount = mysqli_query($link, $RegisterQuery);
                }

                #UserCheck
                settype($name, "string");
                settype($surname, "string");
                settype($email, "string");
                settype($city, "string");
                $TownAns = $AccountAns = "";
                $CheckUser = "SELECT * FROM user";
                $CheckUserResult = mysqli_query($link, $CheckUser);
                $UserArray = array();
                while($UserRow = mysqli_fetch_assoc($CheckUserResult)){
                        $UserArray[] = $UserRow["Email_Address"];
                }
                if(in_array($email, $UserArray)){
                    echo "<style type = 'text/css'>
                            #Address{
                                border: 1px #ff0000 solid;
                            }
                          </style>";
                }
                else{
                    $TownQuery = "SELECT Town_Id FROM town WHERE Name = '$city'";
                    $TownExecute = mysqli_query($link, $TownQuery);
                    while($TownResults = mysqli_fetch_assoc($TownExecute)){
                        $TownAns = $TownResults["Town_Id"];
                    }
                    $AccountQuery = "SELECT Account_Id FROM account WHERE Username = '$HashedUsername' AND Password = '$HashedPassword'";
                    $AccountExecute = mysqli_query($link, $AccountQuery);
                    while($AccountResults = mysqli_fetch_assoc($AccountExecute)){
                        $AccountAns = $AccountResults["Account_Id"];
                    }
                    $UserQuery = "INSERT INTO user(Name, Surname, Email_Address, Town_Id, Account_Id) VALUES('$name', '$surname', '$email', '$TownAns', '$AccountAns')";
                    $UserRegister = mysqli_query($link, $UserQuery);
                }
            }
        }
    }

    #Login Button
    if(isset($_POST["LoginButton"])){
        $LogUsernameBool = $LogPasswordBool = false;
        $LogUsername = $_POST["LoginUsername"];
        $LogPassword = $_POST["LoginPassword"];
        settype($LogUsername, "string");
        settype($LogPassword, "string");
        if(empty($LogUsername)){
            echo "<style type = 'text/css'>
                    #LogUsername{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $LogUsernameBool = true;
        }

        if(empty($LogPassword)){
            echo "<style type = 'text/css'>
                    #LogPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";
        }
        else{
            $LogPasswordBool = true;
        }

        if($LogUsernameBool && $LogPasswordBool){
            include "connect.php";
            $GetAllHashes = "SELECT * FROM account";
            $GetAllHashesResult = mysqli_query($link, $GetAllHashes);
            while($Hashes = mysqli_fetch_assoc($GetAllHashesResult)){
                $IsPasswordCorrect = password_verify($LogPassword, $Hashes["Password"]);
                $IsUsernameCorrect = password_verify($LogUsername, $Hashes["Username"]);
                $_SESSION["Username"] = $LogUsername;
                if($IsPasswordCorrect && $IsUsernameCorrect){
                    header("Location: Menu.php");
                }
                else{
                    echo "<style type = 'text/css'>
                        #LogUsername{
                            border: 1px #ff0000 solid;
                        }

                        #LogPassword{
                            border: 1px #ff0000 solid;
                        }
                      </style>";  
                }

            }
                
        }
        else{
            echo "<style type = 'text/css'>
                    #LogUsername{
                        border: 1px #ff0000 solid;
                    }

                    #LogPassword{
                        border: 1px #ff0000 solid;
                    }
                  </style>";  
        }
    }
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> Football Sportswear </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/eb9905f6ff.js"></script>
    </head>
    <body>
        <h1 id = "SystemTitle"> Football Sportswear Online Shop</h1>
        <form id = "LoginDiv" method = "post" action = "index.php" autocomplete = "off" name = "LoginForm">
            <h1> - - Log In - - </h1>
            <input type = "text" name = "LoginUsername" id = "LogUsername" placeholder = "Enter your Username..." class = "form-control">
            <br/>
            <input type = "password" id = "LogPassword" placeholder = "Enter your Password..." class = "form-control" name = "LoginPassword">
            <a href = "ForgotPassword.php" id = "PasswordForgot"> Forgot your Password ? </a>
            <br/>
            <input type = "submit" value = "Log In" id = "LoginButton" class = "btn btn-outline-light" name = "LoginButton">
        </form>
        <p id = "TopLines">  | | | | | | | |</p>
        <p id = "OrWord"> OR </p>
        <p id = "BottomLines">  | | | | | | | |</p>
        <form id = "RegisterDiv" method = "post" action = "index.php" autocomplete = "off">
            <h1> - - Register - - </h1>
            <div class = "row">
                <div class = "col">
                    <input type = "text" id = "Name" placeholder = "Enter your Name..." class = "form-control" name = "name">
                </div>
                <div class = "col">
                    <input type = "text" id = "Surname" placeholder = "Enter your Surname..." class = "form-control" name = "surname">
                </div>
            </div>
            <div class = "row">
                <div class = "col">
                    <input type = "email" id = "Address" placeholder = "Enter your Email-Address..." class = "form-control" name = "EmailAddress">
                </div>
            </div>
            <div class = "row">
                <div class = "col">
                    <input type = "text" id = "City" placeholder = "City" class = "form-control" name = "city">
                </div>
                <div class = "col">
                    <input type = "text" id = "Country" placeholder = "Country" class = "form-control" name = "country">
                </div>
            </div>
            <div class = "row">
                <div class = "col">
                    <input type = "text" id = "RegUsername" placeholder = "Username" class = "form-control" name = "RegUsername">
                </div>
                <div class = "col">
                    <input type = "password" id = "RegPassword" placeholder = "Password" class = "form-control" name = "RegPassword">
                </div>
            </div>
            <div class = "row" id = "LastRow">
                <div class = "col">
                </div>
                <div class = "col">
                    <input type = "password" id = "RptPassword" placeholder = "Confirm Password" class = "form-control" name = "RegPassword2">
                </div>
            </div>
            <input type = "submit" value = "Register" id = "RegiterButton" class = "btn btn-outline-light" name = "register">
        </form>
        <img src = "https://allianz-arena.com/binaries/content/gallery/allianz-arena/media/images/allianz-arena/fassade-weiss.jpg" alt = "Allianz Arena" id = "BackgroundImage">
        <link type = "text/css" rel = "stylesheet" href="CSS/index.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>