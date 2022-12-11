<?php
    session_start();
    include "conn.php";
    
    $user=$_POST['user'];
    $password=$_POST['password'];
    $sql = "SELECT *  FROM login where user='$user' ";
    $result = $mysqli->query($sql);
            
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc() ) {
            if( ($row["user"]==$user) && ($row["password"]==$password) ) 
            {
                header("location:start.php");
                $_SESSION['user_name']=$user;
            }
            if( ($row["user"]==$user) && ($row["password"]!=$password) )
            {
                echo "<script>alert('Password is Incorrect. please enter correct password');</script>";
                echo "<script>window.location.href='login.html'; </script>";  
            }
        }
    }
    else
    {
        echo "<script>alert('This Username does not exist. Kindly create your account to shop ');</script>";
        echo "<script>window.location.href='signup.html'; </script>";  
    }
?>
