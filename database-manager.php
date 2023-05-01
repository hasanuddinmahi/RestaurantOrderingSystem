<?php

if (!class_exists('DatabaseManager')) {


  class DatabaseManager
  {
    private $db;
    private $database = 'restaurantorderingsystem';
    private $port = 3306;
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";

    public function __construct()
    {

      $this->initDatabase();

      $this->connect();
    }

    public function connect()
    {
      $this->db = new mysqli($this->host, $this->username, $this->password);
      if ($this->db->connect_errno > 0) {
        die('Unable to connect to database [' . $this->db->connect_error . ']');
      }
      mysqli_select_db($this->db, $this->database);
    }

    public function query($sql)
    {
      $result = $this->db->query($sql);
      if (!$result) {
        die('There was an error running the query [' . $this->db->error . ']');
      }
      return $result;
    }

    public function close()
    {
      $this->db->close();
    }

    private function seeders($db)
    {
      $db->query("INSERT INTO `customers` (`ID`, `Email`, `Password`, `FirstName`, `LastName`, `Address`, `Phone`) 
      VALUES ('gngs23nf02309', 'anas@gmail.com', 'anas', 'anas', 'mo', 'the arc', '0110341558')");

      $db->query("INSERT INTO `riders` (`ID`, `Email`, `Password`, `FirstName`, `LastName`) 
      VALUES ('gfdhdj3rsgs09', 'riders@gmail.com', 'anas', 'joe', 'snow')");

      $db->query("INSERT INTO `admin` (`ID`, `Email`, `Password`, `FirstName`, `LastName`) 
      VALUES ('gngretm5tsg09', 'admin@gmail.com', 'anas', 'john', 'cena')");

      // main menu group

      $db->query("INSERT INTO `menu` (`ID`, `Name`) 
      VALUES (2342342, 'Main Menu')");

      $db->query("INSERT INTO `menugroup` (`ID`, `MenuID`, `Name`, `OrderIndex`) 
      VALUES (234532, 2342342, 'Main Dishes', 1)");

      $db->query("INSERT INTO `menugroup` (`ID`, `MenuID`, `Name`, `OrderIndex`) 
      VALUES (793453, 2342342, 'Side Menu', 2)");

      $db->query("INSERT INTO `menugroup` (`ID`, `MenuID`, `Name`, `OrderIndex`) 
      VALUES (876544, 2342342, 'Drinks', 3)");

      // main menu items

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (975532, 234532, 'this is a description', 10.00, 'http://localhost/public/media/saahil-khatkhate-kfDsMDyX1K0-unsplash%202.png', 1, 1, 'Chicken Pizza')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (345353, 234532, 'this is a description 2', 10.34, 'http://localhost/public/media/clark-douglas-17ZU9BPy_Q4-unsplash.jpg', 2, 1, 'Seafood Pasta')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (345462, 234532, 'this is a description 3', 23.10, 'http://localhost/public/media/mgg-vitchakorn-PLyJqEJVre0-unsplash.jpg', 3, 1, 'Salsa Pasta')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (594589, 234532, 'this is a description 4', 13.40, 'http://localhost/public/media/emanuel-ekstrom-KJOUnsGXq58-unsplash.jpg', 4, 0, 'Minced Beef Pasta')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (794474, 234532, 'this is a description 5 ', 54.10, 'http://localhost/public/media/sorin-popa-XAxvKp0tdwU-unsplash.jpg', 6, 1, 'Parmesan Pasta')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
      VALUES (505043, 234532, 'this is a description 6', 10.53, 'http://localhost/public/media/yoav-aziz-EGRJe6BHG9I-unsplash.jpg', 5, 1, 'Chicken Pasta Dumpling')");


      // side menu items

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (345353, 793453, 'this is a description 2', 10.34, 'http://localhost/public/media/jay-gajjar-a4pnELU87jE-unsplash%201.png', 2, 1, 'Steak n Cheese Sandwich')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (345462, 793453, 'this is a description 3', 23.10, 'http://localhost/public/media/luisa-brimble-vIm26fn_QKg-unsplash.jpg', 3, 1, 'Tomato Salad')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (594589, 793453, 'this is a description 4', 13.40, 'http://localhost/public/media/calum-lewis-rPkgYDh2bmo-unsplash%20(1).jpg', 4, 1, 'Cheese Toast Slices')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (794474, 793453, 'this is a description 5 ', 54.10, 'http://localhost/public/media/tania-melnyczuk-xeTv9N2FjXA-unsplash.jpg', 6, 1, 'Ceasar Salad')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (505043, 793453, 'this is a description 6', 10.53, 'http://localhost/public/media/clark-douglas-LvL8u99H0mY-unsplash.jpg', 5, 1, 'Chickpeas Salad')");

      // drinks menu items

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (059645, 876544, 'this is a description 2', 10.34, 'http://localhost/public/media/photo-1559496417-e7f25cb247f3.jpg', 2, 1, 'Coffee')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (058975, 876544, 'this is a description 3', 23.10, 'http://localhost/public/media/monika-grabkowska-fq60QruENEg-unsplash.jpg', 3, 1, 'Fresh Orange Juice')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (098534, 876544, 'this is a description 4', 13.40, 'http://localhost/public/media/katherine-sousa-ln2R1wJ8TCM-unsplash.jpg', 4, 0, 'Ice Tea')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (365458, 876544, 'this is a description 5 ', 54.10, 'http://localhost/public/media/great-cocktails-9PyQwwmZxpI-unsplash%20(1).jpg', 6, 1, 'Mojito')");

      $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`)
      VALUES (748567, 876544, 'this is a description 6', 10.53, 'http://localhost/public/media/blake-wisz-X6aY_j6JD_Y-unsplash.jpg', 5, 1, 'Coca Cola')");

      // ==================

    }

    private function initDatabase()
    {
      $db = new mysqli($this->host, $this->username, $this->password);

      if ($db->query("SHOW DATABASES LIKE '{$this->database}';")->num_rows == 1)
        return;

      $db->query("CREATE DATABASE {$this->database};");

      mysqli_select_db($db, $this->database);

      $db->query("CREATE TABLE `customerorder` (
        `ID` varchar(65) NOT NULL,
        `CustomerID` varchar(65) NOT NULL,
        `OrderStatus` varchar(20) NOT NULL,
        `CreationDate` datetime NOT NULL,
        `OrderedDate` datetime NOT NULL,
        `PreparedDate` datetime NOT NULL,
        `TakenOverDate` datetime NOT NULL,
        `OrderItems` text NOT NULL,
        `isPaid` tinyint(1) NOT NULL,
        `Price` decimal(10,0) NOT NULL,
        `Note` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `admin` (
        `ID` varchar(65) NOT NULL,
        `FirstName` varchar(65) NOT NULL,
        `LastName` varchar(65) NOT NULL,
        `Email` varchar(65) NOT NULL,
        `Password` varchar(65) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `customers` (
        `ID` varchar(65) NOT NULL,
        `FirstName` varchar(65) NOT NULL,
        `LastName` varchar(65) NOT NULL,
        `Email` varchar(65) NOT NULL,
        `Password` varchar(65) NOT NULL,
        `Phone` varchar(65) NOT NULL,
        `Address` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `menu` (
        `ID` int(11) NOT NULL,
        `Name` varchar(65) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `menugroup` (
        `ID` int(11) NOT NULL,
        `MenuID` int(11) NOT NULL,
        `Name` varchar(65) NOT NULL,
        `OrderIndex` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `menuitem` (
        `ID` varchar(65) NOT NULL,
        `MenuGroupID` int(11) NOT NULL,
        `Description` text NOT NULL,
        `Price` decimal(10,0) NOT NULL,
        `Image` text NOT NULL,
        `OrderIndex` int(11) NOT NULL,
        `isAvailable` tinyint(1) NOT NULL,
        `Name` varchar(65) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `restaurant` (
        `Name` varchar(65) NOT NULL,
        `ShortDescription` text DEFAULT NULL,
        `Description` text DEFAULT NULL,
        `CurrentMenuID` int(11) DEFAULT NULL,
        `IsActive` tinyint(1) NOT NULL DEFAULT 0,
        `Username` varchar(60) NOT NULL,
        `Password` varchar(60) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $db->query("CREATE TABLE `riders` (
        `ID` varchar(65) NOT NULL,
        `FirstName` varchar(65) NOT NULL,
        `LastName` varchar(65) NOT NULL,
        `Email` text NOT NULL,
        `Password` text NOT NULL,
        `AssginedOrder` int(11)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );


      $db->query("CREATE TABLE `confirmed_orders` (
        `ID`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `RiderID` varchar(65) NOT NULL,
        `OrderID` varchar(65) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
      );

      $this->seeders($db);

      $db->close();
    }
  }
}
