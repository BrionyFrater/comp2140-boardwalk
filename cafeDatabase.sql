DROP DATABASE IF EXISTS cafeInfo;
CREATE DATABASE cafeInfo;
USE cafeInfo;



DROP TABLE IF EXISTS `menuItems`;
CREATE TABLE `menuItems` (
    `id` int(11) NOT NULL AUTO_INCREMENT ,
    `name` varchar(50) NOT NULL default '',
    `category` varchar(35)  NOT NULL default '',
    `medium_size` char(3) NOT NULL default 'MED', 
    `large_size` char(3) NOT NULL default '', 
    `price` int(5)  NOT NULL default 0,
    `large_price` int(5) NOT NULL default 0,
    PRIMARY KEY (`id`)

)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `menuItems` VALUES (1, 'Chicken','Sandwiches', 'MED', '', 510, 0),
    (2, 'B.L.T','Sandwiches', 'MED', '', 510, 0),
    (3, 'Turkey Club','Sandwiches', 'MED', '', 570, 0),
    (4, 'Traditional Club','Sandwiches', 'MED', '', 570, 0),

    (5, 'Traditional Club','Wraps', 'MED', '', 635, 0),
    (6, 'Turkey Club','Wraps', 'MED', '', 665, 0),
    (7, 'Chicken','Wraps', 'MED', '', 630, 0),
    (8, 'Ham and Cheese','Wraps', 'MED', '', 630, 0),

    (9, 'Fried Chicken','Jamaican', 'MED', 'LRG', 700, 850),
    (10, 'Spicy Baked Chicken','Jamaican', 'MED', 'LRG', 700, 850),
    (11, 'BBQ Pork','Jamaican', 'MED', 'LRG', 700, 850),
    (12, 'Curried Chicken','Jamaican', 'MED', 'LRG', 700, 850),
    
    (13, 'Rice and Peas','Jamaican Sides', 'MED', '', 0, 0),
    (14, 'Plain Rice','Jamaican Sides', 'MED', '', 0, 0),
    (15, 'BBQ Pork','Jamaican Sides', 'MED', '', 0, 0);


    