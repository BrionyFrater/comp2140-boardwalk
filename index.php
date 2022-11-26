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
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    
                    #goes through each menu item and prints its data
                    foreach ($results as $row): ?>

                        <button id="add-to-order-button" onclick="alert('naurr');">
                        <div class="menuItem">
                            <img src=<?="images/".$row['image']?> class="menuItemPic">
            
                            <div class="menuItemContent">
                                <h5><?=$row['name']?></h5>
                                <div class="prices">
                                    <?php 
                                        #checks if the item comes in a large size and prints the large size value
                                        if(intval($row['large_price']) > 0 and intval($row['price']) > 0){?>
                                            
                                            <h6><?=$row['medium_size']?> - $<?=$row['price']?></h6>
                                            <h6><?=$row['large_size']?> - $<?=$row['large_price']?></h6>
                                            
                                            
                                        <?php }elseif(intval($row['price']) > 0){?>
                                             
                                            <h6>Price - $<?=$row['price']?></h6>
                                        <?php } ?>       
                                                 
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                        </button>
                        
                    <?php endforeach;?>
                    
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