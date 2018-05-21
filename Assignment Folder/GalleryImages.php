<?php
    session_start();
    if(isset($_SESSION["Username"])){
        include "connect.php";
        include "header.php";
        echo "<!-- jQuery -->
              <script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
              <!-- Fotorama -->
              <link href='CSS/GalleryImages.css' rel='stylesheet'>
              <script src='Scripts/fotorama.js'></script>
              <body>
                <div class='fotorama' data-width='700' data-ratio='700/467' data-max-width='100%'
                    data-nav='thumbs'
                    data-keyboard='true'
                    data-allowfullscreen='true'
                    data-direction='ltr'>";
                    $GetAllProducts = "SELECT * FROM product";
                    $GetAllProductsResult = mysqli_query($link, $GetAllProducts);
                    while($AllProducts = mysqli_fetch_assoc($GetAllProductsResult)){
                        echo "<img src = '". $AllProducts["URL"] ."' data-caption = 'Products are all in Stock. Sizes range from XS to XXL. Price is &euro;". $AllProducts["Price"] ."'/>";
                    }
                    echo "</div>
                          <div id = 'OtherLinks'>
                            <h3> Links to Other Websites </h3>
                            <p> Juventus F.C. Products: Click <a href = 'https://store.juventus.com/en/' target = '_blank'>here</a></p>
                            <p> F.C. Bayern München Products: Click <a href = 'https://fcbayern.com/shop/en/' target = '_blank'>here</a></p>
                            <p> Paris Saint Germain F.C. Products: Click <a href = 'https://store.psg.fr/en' target = '_blank'>here</a></p>
                            <p> Manchester City F.C. Products: Click <a href = 'http://shop.mancity.com/stores/mancity/en' target = '_blank'>here</a></p>
                            <p> F.C. Real Madrid Products: Click <a href = 'http://shop.realmadrid.com/stores/realmadrid/en' target = '_blank'>here</a></p>
                          </div>
                          <img src = 'https://www.delawarenorth.com/~/media/delawarenorth/images/venue%20images/international/wembly-stadium_t1.jpg?h=350&la=en&w=804' alt = 'Wembley Stadium' id = 'BackgroundImage'>
                        </body>
                    </html>";
    }
    else{
        header("Location: index.php");
    }
?>
