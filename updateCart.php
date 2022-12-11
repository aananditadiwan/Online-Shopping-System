<?php

    session_start();
    include "conn.php";

    $passed_id=$_POST['pid'];
    $sign=$_POST['update'];
    $user=$_SESSION['user_name'];
    if($sign=='minus')
    {      
        $sql = "SELECT * FROM orders where pid='$passed_id' and user='$user' " ;
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();            
        $count= $row['quantity'];
            $count-=1;
        $sql = "update orders set quantity='$count' where user='$user' and pid='$passed_id'";
        $result1 = $mysqli->query($sql); 
        $_SESSION['items']-=1;
    }
    
     if($sign=='plus')
    {
        $sql = "SELECT * FROM orders where pid='$passed_id' and user='$user' " ;
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();            
        $count= $row['quantity'];
        $count+=1;
        $sql = "update orders set quantity='$count' where user='$user' and pid='$passed_id'";
        $result1 = $mysqli->query($sql); 
        $_SESSION['items']+=1;        
    }
if($sign=='del')
    {      
        $sql = "DELETE FROM orders WHERE pid='$passed_id' and user='$user' " ;
        $result = $mysqli->query($sql);
        $_SESSION['items']-=1;
    }
    header("location:cart.php");
?>
