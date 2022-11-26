<?php
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
        
class DBManager{

    private $conn;
    private $host;
    private $username;
    private $password;
    private $dbname;

    function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

       
        try{
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
                $this->username,
                $this->password
            );
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    function menuInfo(){
        #get menu items from the database
        $stmt = $this->conn->query("SELECT * FROM menuItems ORDER BY category");
        $results = $stmt->fetchAll();

        ?><div>
            
        <?php
            #iterates through each row of the data base
            for ($x = 0; $x < count($results); $x++){ 


                #prints item category when item is the first one in the category       
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
                                                 
                                    
                                </div>
                        </div>
                    </div>
                </button>
                        
                    <?php } ?>
        </div><?php
    }

    function userInfo($name){
        $stmt = $this->conn->query("SELECT * FROM menuItems ORDER BY category");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
    }

    function addUser($name, $password){
        #sanitize input
        $this->conn->query("INSERT INTO users (name, password) VALUES ($name, $password)");
    }

    function deleteUser($name){
        #sanitize input
        $this->conn->query("DELETE FROM users WHERE 'name'=$name");
    }





}


?>