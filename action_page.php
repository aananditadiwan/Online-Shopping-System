<?php
    session_start();
    include "conn.php";

    $user=$_SESSION['user_name'];
    $date =date("Y-m-d");

    $orderid = rand();
    $pid;    
    $sql = "SELECT orderID FROM shipped ";
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();
        while($orderid== $row['orderID'])
        {
            $orderid = rand();
        }
    }
    
    $sql = "SELECT * FROM orders where user= '$user' ";
    $result = $mysqli->query($sql);  
    if ($result->num_rows > 0) {  
        while($row = $result->fetch_assoc()) {
            $pid=$row['pid'];
            $sql1 = "INSERT INTO shipped VALUES ( '$orderid','$user' , '$pid' , '$date' )";
            $result1 = $mysqli->query($sql1);
        }
    }

    $sql = "DELETE FROM orders WHERE user='$user' " ;
    $result = $mysqli->query($sql); 

    echo "<script>alert('Payment successfull. Your order is confirmed');</script>";
    echo "<script>window.location.href='start.php'; </script>"; 
?>  

