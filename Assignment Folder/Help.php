<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "header.php";
        echo "<h1 id = 'PageTitle'> Wesite Tips </h1>
               <div id = 'AddingProduct'>
                <h1> Adding a Product </h1>
                <p> Procedures needed whenadding a product: </p>
                <p> Step 1: Inputting the quantity int the Quantity Field</p>
                <div id = 'QunatityExample'>
                    <label for = 'quantity'> Quantity: </label>
                    <input type = 'number' name = 'QuantityExampleField'>
                </div>
                <p> Step 2: Selecting the size required in the Size Dropdown Field</p>
                <div id = 'SizeExample'>
                    <label> Size: </label>
                    <select id = 'PSGHomeSocksSelect'>
                        <option value = '0' selected> Select Size </option>
                        <option value = '1'> Extra Small </option>
                        <option value = '2'> Small </option>
                        <option value = '3'> Medium </option>
                        <option value = '4'> Large </option>
                        <option value = '5'> Extra Large </option>
                        <option value = '6'> Extra Extra Large </option>
                    </select>
                </div>
                <p> Step 3: Press the 'Add to My Cart' Button</p>
                <div id = 'SubmitBtn'>
                    <input type = 'submit' value = 'Add to My Cart' class = 'btn btn-primary' id = 'SbmtBtn'>
                </div>
              </div>
              <div id = 'Icons'>
                <h1> Icons </h1>
                <button class = 'btn btn-outline-warning'><i class = 'fab fa-product-hunt fa-2x'></i></button><span> - - This Button will redirect you to the Products Page </sanp>
                <p><button class = 'btn btn-outline-warning'><i class='fas fa-question-circle fa-2x'></i></button> - - This Button will redirect you to the Help Page </p>
                <p><button class = 'btn btn-outline-warning'><i class = 'fas fa-phone fa-2x'></i></button> - - This Button will redirect you to the Contact Us Page </p>
                <p><button class = 'btn btn-outline-warning'><i class = 'fas fa-comment fa-2x'></i></button> - - This Button will redirect you to the Give Feedback Page</p>
                <p><button class = 'btn btn-outline-warning'><i class = 'fas fa-images fa-2x'></i></button> - - This Button will redirect you tho the Gallery Page </p>
                <p><button class = 'btn btn-outline-warning'><i class = 'fas fa-shopping-cart fa-2x'></i></button> - - This Button will redirect you to the My Cart Page </p>
                <p><button class = 'btn btn-outline-warning'><i class = 'fas fa-sign-out-alt fa-2x'></i></button> - - This Button will log you out of your account and redirect you to the Login and Registration page</p>                 
              </div>
              <div id = 'Rules'>
                <h1> General Rules </h1>
                <div id = 'UpdatingProduct'>
                    <h1> Updating a Product </h1>
                        <span> You have the chance to Update a product which is found in the My Cart Page with this button:</span><br/>
                        <input type = 'submit' value = 'Update' class = 'btn btn-warning' id = 'SbmtBtn'>
                        <span style = 'color: #ff0000'>* IMPORTANT *</span><span> All fields give MUST be filled</span><br/>
                </div>
                <div id = 'DeletingProduct'>
                    <h1> Deleting a Product </h1>
                        <span> You have the chance to Delete a product which is found in the My Cart Page with this button:</span><br/>
                        <input type = 'submit' value = 'Delete' class = 'btn btn-danger' id = 'SbmtBtn'>
                </div>
            </div>
                
                
                
        <img src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Paris_Parc_des_Princes_1.jpg/1200px-Paris_Parc_des_Princes_1.jpg' alt = 'Parc des Princes' id = 'BackgroundImage'>
        <link type = 'text/css' rel = 'stylesheet' href='CSS/Help.css'>
        <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>>";
        
        
        
        
        
        
        
        
        

    }
    else{
        header("Location: index.php");
    }







?>