<?php

require "../config/connection.php";

if (isset($_POST['submit'])) {
$id = $_POST['id'];
$name =  $_POST['name'];
$contact =  $_POST['contact'];

$qry = "UPDATE `users` SET `name`='$name',`contact`= '$contact' WHERE `id`= '$id' " ;

if (mysqli_query($connection , $qry)) {
    header("Location: ../views/user.php"); 
    exit();
    
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
}

?>