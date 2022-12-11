<?php
    session_start();
    $_SESSION['y']=0;
    include "conn.php";

    $user=$_POST['user'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $address=$_POST['address'];

    $sql = "SELECT *  FROM login where user='$user' ";
    $result = $mysqli->query($sql);        
    if ($result->num_rows < 0) 
    {
        echo "<script>alert('This Username already exists. Kindly enter a unique username for your account ');</script>";
        echo "<script>window.location.href='signup.html'; </script>";  
    }
    else
    {   
        
        $sql = "INSERT INTO login(user,email,password,address) VALUES ('$user', '$email', '$password', '$address')";
        $result = $mysqli->query($sql); 
        $_SESSION['user_name']=$user;
        header("location:start.php");
    }
?>




 
