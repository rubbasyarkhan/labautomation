<?php
require "../config/connection.php";
    $qry = "select * from category";
    $result= mysqli_query($connection, $qry);
?>