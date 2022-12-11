<?php
    session_start();
    include "conn.php";
    
    $user=$_POST['user'];
    $password=$_POST['password'];
    $sql = "SELECT *  FROM login where user='$user' and privlage='admin'";
    $result = $mysqli->query($sql);
            
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc() ) {
            if( ($row["user"]==$user) && ($row["password"]==$password) ) 
            {
                header("location:edit.php");
                $_SESSION['user_name']=$user;
            }
            if( ($row["user"]==$user) && ($row["password"]!=$password) )
            {
                echo "<script>alert('Password is Incorrect. please enter correct password');</script>";
                echo "<script>window.location.href='admin.html'; </script>";  
            }
        }
    }
    else
    {
        echo "<script>alert('This Username does not have root privlages ');</script>";
        echo "<script>window.location.href='start.php'; </script>";  
    }
?>
