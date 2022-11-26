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

       
        <section id="menu-wrapper">
            <h2>Menu</h2>
            
            <div id="menu-items-wrapper">
                

                <?php
                    require_once 'DBManager.php';

                    #turn on error reporting
                    ini_set('display_errors', 'On');
                    error_reporting(E_ALL | E_STRICT);

                    #connects to databse
                    $host = 'localhost';
                    $username = 'boardwalk_user';
                    $password = 'password123';
                    $dbname = 'cafeInfo';
                    
                    $db = new DBManager($host, $username, $password, $dbname);
                    $db->menuInfo();
      
                    #goes through each menu item and prints its data
                    
                    ?>
                    
            </div>
        </section>

        <aside id="order-list">

        </aside>
        
        
    </div>
    
    <!--Testing manager functionality to add/update image
    <form action="test-imageUpload.php" method="post" enctype="multipart/form-data">
        <input name="menu-item-image" type="file">
        <input name="submit" type="submit" value="Upload">

    </form>
    -->

</body>
</html>