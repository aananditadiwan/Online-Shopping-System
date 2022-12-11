<?php
    include "conn.php";
    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>  
        <h2 id="logHead">ADMINISTRATIVE PRIVLAGES</h2>
        <div style="background-color:white;height:auto;color:black;padding-bottom:30px">   
            <h1 id="pin"> All Categories</h1> 
            <a href="logout.php" id="adm" >Log Out</a>
            <?php
                $sql = "SELECT *  FROM tables ";
                $result = $mysqli->query($sql);
                $name;

                if ($result->num_rows > 0) {    
                    while($row = $result->fetch_assoc()) {
                        echo '<h3 style="color:DarkMagenta; margin-bottom:10px;margin-left:7%;">Category : '. $row['name'] .'</h3><br>';
                        $name= $row['name'];
                        $sql1 = "SELECT *  FROM $name ";
                        $result1 = $mysqli->query($sql1);
                        if ($result1->num_rows > 0) {  
                            while($row1 = $result1->fetch_assoc()) {
                             echo '<p style="margin-left:13%;"> Product id :'.$row1["id"].'<br>Product name :'.$row1["name"] .'<br>Company : '.$row1["company"].'</p>';
                            }
                        }
                        else{
                                echo "<p style='margin-left:13%;'> No product available in this category </p>";
                        }
                        echo "<hr>";
                    }
                }
            ?>
            <h2 style="color:Chocolate; text-align:center;">Choose the option : </h2><br>
            <div style="text-align:center;">

                <p style="color:RebeccaPurple;">1. Add a product : </p>
                    <form action='addProduct.php' method='post' > 
                    <label for="tname"> Category Name : </label>
                        <input type="text" name='tname' placeholder="lipsticks"><br>
                    <button name='view' type='submit' class='button'>Add Product</button>
                    </form> <hr><br><br>

                <p style="color:RebeccaPurple;">2. Delete a product</p>
                    <form action='DeleteProduct.php' method='post' > 
                    <label for="tname"> Category Name : </label>
                        <input type="text" name="tname" placeholder="lipsticks">
                    <label for="tname"> Product Id : </label>
                        <input type="text" name='pid' placeholder="101"><br>
                    <button name='view' type='submit' class='button'>Delete Product</button>
                    </form><hr><br><br>

                <p style="color:RebeccaPurple;">3. Create a new Category : </p>  
                    <form action='createCategory.php' method='post' > 
                    <label for="tname"> Category Name : </label>
                        <input type="text" name='tname' placeholder="lipsticks"><br>
                    <button name='view' type='submit' class='button'>Create Category</button>
                    </form><hr><br><br>    

                <p style="color:RebeccaPurple;">4. Delete Category : </p>  
                    <form action='DeleteCategory.php' method='post' > 
                    <label for="tname"> Category Name : </label>
                        <input type="text" name='tname' placeholder="lipsticks"><br>
                    <button name='view' type='submit' class='button'>Delete Category</button>
                    </form><hr><br><br>     
            </div>






