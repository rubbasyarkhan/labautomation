<?php
require "../config/connection.php";

session_start();
if (isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $desc = mysqli_real_escape_string($connection, $_POST["description"]);
    $qry = "INSERT INTO `tests`(`name`, `description`) VALUES ('$name', '$desc')";
    $res = mysqli_query($connection, $qry);
    
    if ($res) {
        echo "<script>alert('Successfully added')</script>";
    } else {
        echo "<script>alert('Error adding record: " . mysqli_error($connection) . "')</script>";
    }

    echo "<script>window.location.href='../views/test.php'</script>";
}
?>
