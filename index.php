<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place an Order With Us</title>

    <link rel="stylesheet" href="index.css">
</head>
<body>

    <!--<?php
        if(isset($_POST['submit'])){
            #turn on error reporting
            ini_set('display_errors', 'On');
            error_reporting(E_ALL | E_STRICT);

            #connects to databse
            $host = 'localhost';
            $username = 'boardwalk_user';
            $password = 'password123';
            $dbname = 'cafeInfo';
            
            try {
                $conn = new PDO(
                    'mysql:host=' . $host . ';dbname=' . $dbname,
                    $username,
                    $password
                );

            } catch (Exception $e) {
                die($e->getMessage());
            }

            $img = $_FILES['menu-item-image']['name'];

            $stmt = $conn->query("INSERT into menuItems (image) VALUES ($img)");
            move_uploaded_file($_FILES['image'][$img], "images/$img");


            echo "<script>alert('Uploaded')</script>";
        }
    ?>-->
    
    <div id="wrapper">
        <header>
            <img src="images/boardWalkLogo.png" alt="boardwalk cafe's logo" id="boardwalkHeaderLogo">
    
            <br>
            <br>
            <h1>Welcome to the Boardwalk Caf&eacute;</h1>
            <h5>Providing Healthy Choices Since 2016</h2>  
        </header>

       
        <section id="menu-wrapper">
            <h2>Menu</h2>
            
            <div id="menu-items-wrapper">
                

                <?php

                    #turn on error reporting
                    ini_set('display_errors', 'On');
                    error_reporting(E_ALL | E_STRICT);

                    #connects to databse
                    $host = 'localhost';
                    $username = 'boardwalk_user';
                    $password = 'password123';
                    $dbname = 'cafeInfo';
                    
                    try {
                        $conn = new PDO(
                            'mysql:host=' . $host . ';dbname=' . $dbname,
                            $username,
                            $password
                        );

                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                            
                    #get menu items and orders them by category
                    $stmt = $conn->query("SELECT * FROM menuItems ORDER BY category");
                    $results = $stmt->fetchAll();
                    
      
                    #goes through each menu item and prints its data
                    
                    ?><div><?php
                    
                    for ($x = 0; $x < count($results); $x++){ 
                        
                        if($x > 0 and $results[$x-1]['category'] != $results[$x]['category']){?>
                            <h3 class="category-heading"><?=$results[$x]['category']?></h3>
                        <?php }elseif($x === 0){?>
                            <h3 class="category-heading"><?=$results[$x]['category']?></h3>
                        <?php } ?>
                        
                    
                        <button class="addToOrderButton" onclick="alert('naurr');">
                        <div class="menuItem">
                            <img src=<?="images/".$results[$x]['image']?> class="menuItemPic">
            
                            <div class="menuItemContent">
                                <h5><?=$results[$x]['name']?></h5>
                                <div class="prices">
                                    <?php 
                                        #checks if the item comes in a large size and prints the large size value
                                        if(intval($results[$x]['large_price']) > 0 and intval($results[$x]['price']) > 0){?>
                                            
                                            <h6><?=$results[$x]['medium_size']?> - $<?=$results[$x]['price']?></h6>
                                            <h6><?=$results[$x]['large_size']?> - $<?=$results[$x]['large_price']?></h6>
                                            
                                            
                                        <?php }elseif(intval($results[$x]['price']) > 0){?>
                                             
                                            <h6>Price - $<?=$results[$x]['price']?></h6>
                                        <?php } ?>       
                                                 
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                        </button>
                        
                    <?php } ?>
                    </div>
                    
            </div>
        </section>
        
        
    </div>
    
    <!--Testing manager functionality to add/update image
    <form action="test-imageUpload.php" method="post" enctype="multipart/form-data">
        <input name="menu-item-image" type="file">
        <input name="submit" type="submit" value="Upload">

    </form>
    -->
</body>
</html>