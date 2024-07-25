<?php

require "../config/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST["name"];

    $qry = "UPDATE `products` SET `name`='$name' WHERE `id`= '$id'";

    if (mysqli_query($connection, $qry)) {
        header("Location: ../views/product.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
