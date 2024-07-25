<?php
require "../config/connection.php";

if (isset($_POST["submit"])) {
    session_start();

    $name = $_POST["categoryName"];
    $qry = "INSERT INTO `category`(`name`) VALUES ('$name')";
    $res = mysqli_query($connection, $qry);
}
;

echo "<script>window.location.href='../views/category.php'</script>";

// echo "<script>alert('Successfully added')</script>";

?>