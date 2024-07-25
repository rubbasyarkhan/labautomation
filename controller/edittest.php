<?php
// category_edit.php

require "../config/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $desc = $_POST["description"];

    $qry = "UPDATE tests SET name='$name',description='$desc' WHERE id = $id"; 

    if (mysqli_query($connection, $qry)) {
        header("Location: ../views/test.php"); 
        exit();
        
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>
