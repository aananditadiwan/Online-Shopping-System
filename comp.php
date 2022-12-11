<?php

    function disp($name) {
        include"conn.php";
        include "isset.php";

        $sql = "SELECT *  FROM $name ";
        $result = $mysqli->query($sql);
            
        if ($result->num_rows > 0) {    
            while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo '<img id="img"  src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" />';
                echo "<b> " . $row["company"]."</b> <br>" . $row["name"]. "<br>  Price: " . $row["price"].  "<br>";
                echo "<form action='description.php' method='post'> 
                            <input type='hidden' name='table' value='".$name."'>   
                            <button name='view' type='submit' value=' " .$row["id"]. " ' class='button'>View Product</button>
                      </form>    </p><br><br><br><br><br>";
            }
        }
        else {
            echo "Sorry there is no product currently available in this category";
        }
    }

    function descr($passed_id ,$name) {
        include"conn.php";
        include "isset.php";

        $sql = "SELECT *  FROM $name where id='$passed_id' ";  
        $result = $mysqli->query($sql);
            
        if ($result->num_rows > 0) {    
            while($row = $result->fetch_assoc()) {
                //echo "<p margin-top:30px>";            
                echo '<img id="img"  src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" />';
                echo "<b>".$row["company"]."</b><br><br>Model :".$row["name"]."<br><br> Price : " . $row["price"]."<br><br>Description :<br>".$row["descr"].  "<br><br>";
                echo "<form action='add.php' method='post'> 
                            <input type='hidden' name='table' value='".$name."'>
                            <button name='buy' type='submit' value=' " .$row["id"]. " ' class='button'>Add To Cart</button>
                      </form>   </p><br><br><br><br><br>";
                } 
            }  
    }

    function msg($passed_id,$y)
    {
        include"conn.php";

        $tid=$total=0;
        $sql = "SELECT * FROM tables " ;
        $result = $mysqli->query($sql);
        while($row = mysqli_fetch_array($result))
        {$total = $row['id'];}


        for ($x = 1; $x <= $total; $x++) {
            if($passed_id<= pow(10,$x) )
            {
                $tid=$x;
                break;
            }
            if( ($passed_id>pow(10,$x)) && ($passed_id<pow(10,$x+1)) )
            {
                $tid=$x;
                break;
            }      
        }   

        $sql = "SELECT name FROM tables where id='$tid' ";
        $result = $mysqli->query($sql);
        $row = mysqli_fetch_array($result);
        $name = $row[0];
        
        $sql = "SELECT *  FROM $name where id='$passed_id'";
        $result = $mysqli->query($sql);
            
        if ($result->num_rows > 0) {    
            while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo '<img id="img"  src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" />';
                echo "<b> " . $row["company"]."</b> <br>" . $row["name"]. "<br>  Price: " . $row["price"].  "<br>";
                if($y==1) {
                    return $row['name'];
                }         
            }
        }
        
        
    }
?>   



