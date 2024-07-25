<?php
require "../config/connection.php";
    $qry = "SELECT * from tests";
    $result= mysqli_query($connection, $qry);
?>