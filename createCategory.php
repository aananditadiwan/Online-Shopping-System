<?php
    include "conn.php";
    $name= $_POST["tname"]; 

    
    $sql = "INSERT INTO tables(name) VALUES ('$name')";
    $result = $mysqli->query($sql); 

    $sql1 = "SELECT * FROM tables where name= '$name' " ;
    $result1 = $mysqli->query($sql1);
    $row1 = $result1->fetch_assoc();  
    $id= $row1['id'];

    $x= pow(10,$id);

    $sql = //"CREATE TABLE foo ( id INT(6) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30),company VARCHAR(30) ,descr VARCHAR(50), img longtext )ENGINE=InnoDB DEFAULT CHARSET=latin1";
"CREATE TABLE `test`.foo ( `id` INT(11)  AUTO_INCREMENT , `name` VARCHAR(255)  , `company` VARCHAR(255)  , `price` VARCHAR(11) , `descr` VARCHAR(500)  , `img` BLOB , PRIMARY KEY (`id`)) ENGINE = InnoDB"; 
    $result = $mysqli->query($sql);

    $sql= "ALTER TABLE foo AUTO_INCREMENT = $x";
    $result = $mysqli->query($sql);

    $sql = "ALTER TABLE foo RENAME TO $name";  
    $result = $mysqli->query($sql);

    header("Location:edit.php");
?>

