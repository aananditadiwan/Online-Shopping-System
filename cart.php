<?php
    session_start();
    include "comp.php";
    include "conn.php";
    $user=$_SESSION['user_name'];
    $_SESSION['cart']=array();
?>
<html>
    <title>Online shopping system</title>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <h2 id="myHeader">Online Shopping Store</h2>         
        <span><a href='start.php' id="log" style="color:DarkMagenta;"><h3>  Back to Main Site</h3></a></span>
                                         
        <div style="background-color:white;color:black;text-align:center;">
            <h1 id="pin"> Your Cart</h1>   
            <?php
                $sql = "SELECT * FROM orders where user='$user' " ;
                $result = $mysqli->query($sql);
                $total=0;
                if ($result->num_rows > 0) {  
                   while( $row = $result->fetch_assoc())
                    {
                        $bad_symbols = array(",", ".");
                        $value = str_replace($bad_symbols, "", $row["price"]);

                        if($row['quantity']>1){
                            $total +=$row['quantity']*$value; }
                        else {
                        $total += $value ; }
                        array_push($_SESSION['cart'],$value);                       
                        echo "<div>";

                        $pid=$row['pid'];
                        $pname=msg("$pid",1);
                        array_push($_SESSION['cart'],$pname); 

                        echo "<br> Quantity :  ". $row['quantity'] ;
                        if($row['quantity']>1)
                        {
                            echo "<form action='updateCart.php' method='post' > 
                                        <input type='hidden' name='pid' value=' ".$row['pid']. " '>
                                        <button name='update' type='submit' value='minus'class='button button1'>-</button>
                                        <button name='update' type='submit' value='plus'class='button button1' >+</button>
                                  </form> ";
                        }
                        else {
                                echo "<form action='updateCart.php' method='post' > 
                                        <input type='hidden' name='pid' value=' ".$row['pid']. " '>
                                        <button name='update' type='submit' value='del' class='button button1'>Remove Item</button>
                                        <button name='update' type='submit' value='plus'class='button button1' >+</button>
                                  </form> ";
                        }                             
                        echo"<hr><br><br><br></div>";              
                    }        
                    
                    echo '<p style="text-align:center;">';                
                    echo '<h3 >Total Amount  :  <span style="color:red;padding-bottom:30px;">Rs. '.  number_format($total) .' </span></h3>';
                    echo "<form action='bank.php' method='post' style='padding-bottom:30px;'> 
                              <button name='bank' type='submit'  value = '". $total ."' class='button button2'>Payment</button>
                          </form>   </p>";   
                }
                else {
                    echo "<h3  id='track>Your Cart is Empty. Lets get shopping !</h3>";
                    echo "<a href='start.php' id='log' > Shop Now</a>";
                }
            
            ?>           
        </div>
        <footer>
            <p>
            copyright@ Aanandita,Akshay and Nisha <br>
            <a href="about.html">About Us</a><br>
            <a href="contact.html">Contact Us</a>
            </p>          
        </footer>
    </body>
</html>    



