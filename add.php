<?php
    session_start();
    include "conn.php";
    $pid=$_POST['buy'];
    $name= $_POST['table']; 
    if(isset($_SESSION['user_name']))
    {
        $user=$_SESSION['user_name'];
        $sql = "SELECT * FROM $name where id='$pid' ";  
        $result = $mysqli->query($sql);                        
        $row = $result->fetch_assoc();        
        $price=$row['price'];

        $sql1 = "SELECT * FROM orders where user= '$user' and pid='$pid' " ;
        $result1 = $mysqli->query($sql1);

        if ($result1->num_rows > 0) {  
            $row1 = $result1->fetch_assoc();            
            $count= $row1['quantity'];
            $count+=1;
            $sql = "update orders set quantity='$count' where user='$user' and pid='$pid'";
            $result1 = $mysqli->query($sql); 
        }
        else {
            $sql = "INSERT INTO orders(user,pid,price,quantity) VALUES ('$user', $pid, '$price',1)";
            $result = $mysqli->query($sql); 
        }
        $_SESSION['items']+=1;
        echo "<script>alert('Product added to cart');</script>";
        echo "<script>window.location.href='start.php'; </script>"; 
    }
    else{ 
        echo "<script>alert('Please login to add products to cart');</script>";
        echo "<script>window.location.href='login.html'; </script>"; 
     }
?>
