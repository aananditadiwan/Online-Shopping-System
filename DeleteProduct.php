<?php
    include "conn.php";

    $id=$_POST['pid'];
    $name=$_POST['tname'];
    
    $sql = "DELETE FROM $name WHERE id='$id' " ;
    $result = $mysqli->query($sql);

    header("Location:edit.php");
?>


