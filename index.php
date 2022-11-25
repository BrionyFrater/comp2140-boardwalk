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
    <div id="wrapper">
        <header>
            <img src="images/boardWalkLogo.png" alt="boardwalk cafe's logo" id="boardwalkHeaderLogo">
    
            <br>
            <br>
            <h1>Welcome to the Boardwalk Caf&eacute;</h1>
            <h5>Providing Healthy Choices Since 2016</h2>  
        </header>

        <!--MENU-->
        <section id="menu-wrapper">
            <h2>Menu</h2>
            
            <div id="menu-items-wrapper">
                <div class="menuItem">
                    <img class="menuItemPic">
    
                    <div class="menuItemContent">
                        
                    </div>
                </div>

                <?php
                
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
                    $stmt = $conn->query("SELECT * FROM menuItems");
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    
                    #goes through each menu item and prints its data
                    foreach ($results as $row) {
                        echo $row['name'];
                    }
                    ?>
                

            </div>
        </section>
        
        
    </div>
    
</body>
</html>