<?php
    session_start();
    session_destroy();

    echo "<script>alert('Great Having you with us ! Hope to see you soon ;) ');</script>";
    echo "<script>window.location.href='start.php'; </script>";  
?>
