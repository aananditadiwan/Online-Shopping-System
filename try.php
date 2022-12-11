<?php
    include "conn.php";
$total=0;
 $sql = "SELECT * FROM tables " ;
        $result = $mysqli->query($sql);
        while($row = mysqli_fetch_array($result))
        {$total = $row['id'];}

echo $total;
