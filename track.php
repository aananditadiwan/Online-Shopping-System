<?php
    session_start();
    include "isset.php";
    include "comp.php";
?>
<html>
    <title>Online shopping system</title>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css"> 
    </head>
    <body>
        <p>
            <?php
                if(isset($_SESSION['user_name']))
                {
                    echo '<h4 id="log"><span class="price" style="color:white;"><i class="fa fa-shopping-cart"></i> <b>'. $_SESSION['items'] .' </b></span></h4>';
                    echo '<a href="cart.php" id="log" >'  ."Cart".'</a>';
                    echo '<a href="logout.php" id="log" >'." Log Out".'</a>';
                }
                else {
                    echo '<a href="login.php" id="log" >'." Login".'</a>';
                }
            ?>
            <h2 id="myHeader">Online Shopping Store</h2> 
            <img src="header.gif"  width="100%" height="200">       
        </p>
        <section>
            <div style="background-color:white;height:auto;color:black;">                
                <a href='start.php' id="log" style="color:DarkMagenta;"><h3>  Back to Main Site</h3></a>
                
                <?php
                    $sql = "SELECT * FROM shipped where user='$user' ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {    
                        while($row = $result->fetch_assoc()) {
                            echo "<p id='ord'> Order Id : ".$row['orderID'] ."</p>";
                            msg($row['pid'],0);
                            echo "<br><br>Date of purchase : ".$row['date']."<hr><br><br><br><br>";
                        }
                    }
                    else {
                        echo "<p id='track'>You have not shopped with us yet. We look forward to it.</p>";
                    }
                ?>
            </div> 
        </section> 
        <footer>
            <p>
                copyright@ Aanandita ,Akshay and Nisha <br>
                <a href="about.html">About Us</a><br>
                <a href="contact.html">Contact Us</a>
            </p>          
        </footer>     
    </body>
</html>
