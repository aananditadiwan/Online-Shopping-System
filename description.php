<?php
    session_start();
    include"conn.php";
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
            if(isset($_SESSION['user_name'])) {
                echo '<h4 id="log"><span style="color:white;"><i class="fa fa-shopping-cart"></i> <b>'. $_SESSION['items'] .' </b></span></h4>';
                echo '<a href="cart.php" id="log" >'  ."Cart".'</a>';
                echo '<a href="logout.php" id="log" >'." Log Out".'</a>';
            }
            else {
                echo '<a href="login.html" id="log" >'." Login".'</a>';
            }
        ?>
        <h2 id="myHeader">Online Shopping Store</h2> 
        <?php
            if(isset($_SESSION['user_name'])) {
                echo '<span id="cart"><a href="track.php" >'."Track my Order".'</a></span>';} 
        ?>
        <img src="header.gif"  width="100%" height="200">       
        </p>

        <section>
            <nav>
                <br><br>
                <b id="sp">Filter By Product</b>
                <ul>
                    <?php 
                        $sql = "SELECT * FROM tables";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {  
                            while($row = $result->fetch_assoc()) {  
                                echo "<li><a href='start.php?tid=".$row['id']."&tname=".$row['name']."'>".$row['name']."</a></li><br>";
                            }
                        }
                    ?>
                    
                </ul>
            </nav>
  
            <article>                
                <?php 
                    $passed_id= $_POST["view"]; 
                    $name=$_POST["table"];
                    descr($passed_id,$name);
                 ?>
            </article>
        </section>

        <footer>
            <p>
            copyright@ Aanandita,Akshay and Nisha <br>
            <a href="about.html">About Us</a><br>
            <a href="contact.html">Contact Us</a>
            </p>          
        </footer>
    </body>
</html>

