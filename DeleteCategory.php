<?php
    include "conn.php";
    $name= $_POST["tname"]; 

    $sql1 = "DELETE FROM tables where name= '$name' " ;
    $result1 = $mysqli->query($sql1);

    $sql1 = "DROP TABLE $name " ;
    $result1 = $mysqli->query($sql1);

    header("Location:edit.php");
?>
    
