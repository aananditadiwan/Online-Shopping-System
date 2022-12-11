<?php
    session_start();
    include "conn.php";
    
if (count($_FILES) > 0) {

    $tname = $_POST['tname'];
    $n = $_POST['n'];
    $c = $_POST['company'];
    $p = $_POST['price'];
    $d = $_POST['descr'];

    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        
        $sql = "INSERT INTO $tname (name, company,price, descr,img) VALUES('$n','$c','$p','$d','{$imgData}') ";
        $result = $mysqli->query($sql);  
       
        //if (isset($current_id)) {
            header("Location: edit.php");
        //}
    }
}

?>    
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>  
<?php $tname = $_POST['tname']; ?>
        <h2 id="logHead">ADMINISTRATIVE PRIVLAGES</h2>
        <div style="background-color:white;height:auto;color:black;padding-bottom:30px">   
            <h1 id="pin"> Adding Product Details in table<p style="color:red;"> <? echo $tname ?></p></h1> 
            <a href="logout.php" id="adm" >Log Out</a><br><br>
            <p>
                <form name="frmImage" action='' method='post' style="text-align:center;"  enctype="multipart/form-data" class="frmImageUpload"> 
                    <input type="hidden" name="tname" value="<?echo $tname ?>">
                    Product Name : 
                        <input type="text" name="n" placeholder="AWT 27"><br><br><br>
                    Product Company :
                        <input type="text" name="company" placeholder="UNICEF"><br><br><br>
                    Price :
                        <input type="text" name="price" placeholder="UNICEF"><br><br><br>
                    Product Description : 
                        <textarea name="descr" rows="5" cols="40"></textarea><br>

                    <label>Upload Image File:</label><br /> 
                        <input name="userImage" type="file" class="inputFile" /> 
                    <button type="submit" value="Submit" class="btnSubmit">POST</button>
                </form>
            </p>
    </body>
</html>
