<?php
require "../config/connection.php";
    $qry = "select * from users";
    $result= mysqli_query($connection, $qry);
?>