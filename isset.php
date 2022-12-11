<?php    
    include "conn.php";
    $x=0;
    if(isset($_SESSION['user_name']))
    {   $user=$_SESSION['user_name'];
        $sql = "SELECT * FROM orders where user= '$user' " ;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                $x+=$row['quantity'];
            }
        }
     }
     $_SESSION['items']=$x;
?>
